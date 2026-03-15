<?php

namespace App\Services;

use App\Models\Account;
use App\Models\JournalEntry;
use App\Models\JournalEntryItem;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class AccountService
{
    /**
     * Transfer amount between two accounts using double-entry accounting.
     *
     * @param int|string $fromAccountId
     * @param int|string $toAccountId
     * @param float $amount
     * @param string $description
     * @param string|null $referenceType
     * @param int|null $referenceId
     * @return JournalEntry
     * @throws InvalidArgumentException
     */
    public function transferBetweenAccounts($fromAccountId, $toAccountId, float $amount, string $description, ?string $referenceType = null, ?int $referenceId = null): JournalEntry
    {
        if ($fromAccountId === $toAccountId) {
            throw new InvalidArgumentException('Cannot transfer between same account');
        }

        $fromAccount = Account::findOrFail($fromAccountId);
        $toAccount = Account::findOrFail($toAccountId);

        // Check sufficient balance if asset/liability
        if (in_array($fromAccount->type, ['asset', 'liability'])) {
            $fromBalance = $this->getAccountBalance($fromAccountId);
            if ($fromBalance < $amount) {
                throw new InvalidArgumentException("Insufficient balance in '{$fromAccount->name}': {$fromBalance} < {$amount}");
            }
        }

        DB::beginTransaction();

        try {
            // Create journal entry
            $journalEntry = JournalEntry::create([
                'date' => now()->format('Y-m-d'),
                'description' => $description,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
            ]);

            // Debit TO account
            JournalEntryItem::create([
                'journal_entry_id' => $journalEntry->id,
                'account_id' => $toAccount->id,
                'debit' => $amount,
                'credit' => 0,
            ]);

            // Credit FROM account
            JournalEntryItem::create([
                'journal_entry_id' => $journalEntry->id,
                'account_id' => $fromAccount->id,
                'debit' => 0,
                'credit' => $amount,
            ]);

            // Update running balances
            $this->updateRunningBalance($fromAccountId);
            $this->updateRunningBalance($toAccountId);

            DB::commit();

            return $journalEntry;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Get current balance for account (sum journal items)
     */
    public function getAccountBalance(int $accountId): float
    {
        $account = Account::findOrFail($accountId);

        $totalDebit = JournalEntryItem::where('account_id', $accountId)->sum('debit');
        $totalCredit = JournalEntryItem::where('account_id', $accountId)->sum('credit');

        $balance = $totalDebit - $totalCredit;

        // Asset/Liability: Debit positive, Liability: Credit positive
        if ($account->type === 'liability') {
            $balance = $totalCredit - $totalDebit;
        }

        return (float) $balance;
    }

    /**
     * Update account running_balance field (add column if needed via migration)
     */
    public function updateRunningBalance(int $accountId): void
    {
        $account = Account::find($accountId);
        if (!$account) return;

        $balance = $this->getAccountBalance($accountId);
        $account->update(['running_balance' => $balance]);
    }

    /**
     * Get or create account by code/name/type
     */
    public function getOrCreateAccount(string $code, string $name, string $type = 'asset'): Account
    {
        return Account::firstOrCreate(
            ['code' => $code],
            ['name' => $name, 'type' => $type, 'is_active' => true]
        );
    }
}

