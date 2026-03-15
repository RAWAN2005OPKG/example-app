# Accounting System Fixes - BLACKBOXAI

## Current Progress
✅ **Plan approved** - Comprehensive fix for all accounting issues

## TODO List

### 1. **Model Fixes** (Priority High)
- [ ] app/Models/KhaledVoucher.php - Add `amount` to fillable
- [ ] app/Models/BankAccount.php - Add `resolved_balance` accessor + `applyBalanceDelta` method
- [ ] app/Models/Account.php - Add running_balance column/mutator if missing
- [ ] Ensure JournalEntryItem syncs account balances

### 2. **Services** (Priority High)
- [ ] Create app/Services/AccountService.php - Central balance operations
- [ ] Update app/Services/FinancialService.php - Use journal totals primarily

### 3. **Controllers** (Priority Medium)
- [ ] app/Http/Controllers/Dashboard/FundTransferController.php - Journal-only, fix methods
- [ ] app/Http/Controllers/Dashboard/AnnualProfitController.php - Better account classification
- [ ] Review JournalEntryController, AccountController for consistency

### 4. **Views** (Priority Medium)
- [ ] resources/views/dashboard/fund_transfers/**\* - Add balance display/validation
- [ ] Financial dashboard pages - Fix display logic

### 5. **Global Fixes**
- [ ] Currency conversion service
- [ ] Double-entry enforcement middleware
- [ ] Account chart seeder

### 6. **Testing**
- [ ] Test all fund transfer scenarios
- [ ] Verify balance consistency across pages
- [ ] Clear caches: `php artisan route:clear view:clear config:clear`

## Next Step: Model fixes

**Completed Steps:** 0/20

