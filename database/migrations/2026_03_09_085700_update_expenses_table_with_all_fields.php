<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $columns = [
                'receipt_name' => ['type' => 'string', 'nullable' => true, 'after' => 'date'],
                'receipt_value_shekel' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'receipt_name'],
                'cost_value_dollar' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'receipt_value_shekel'],
                'job' => ['type' => 'string', 'nullable' => true, 'after' => 'phone'],
                'id_number' => ['type' => 'string', 'nullable' => true, 'after' => 'job'],
                'walid_share_amount' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'id_number'],
                'mohammad_khalid_share_amount' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'walid_share_amount'],
                'walid_paid_dollar' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'amount_ils'],
                'mohammad_khalid_paid_dollar' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'walid_paid_dollar'],
                'walid_paid_shekel' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'mohammad_khalid_paid_dollar'],
                'mohammad_khalid_paid_shekel' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'walid_paid_shekel'],
                'remaining_amount' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'mohammad_khalid_paid_shekel'],
                'remaining_amount_dollar' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'remaining_amount'],
                'difference_in_payments' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'remaining_amount_dollar'],
                'total_paid_amount' => ['type' => 'decimal', 'precision' => 15, 'scale' => 2, 'nullable' => true, 'after' => 'difference_in_payments'],
                'payment_details' => ['type' => 'json', 'nullable' => true, 'after' => 'total_paid_amount'],
            ];

            foreach ($columns as $column => $details) {
                if (!Schema::hasColumn('expenses', $column)) {
                    if ($details['type'] === 'decimal') {
                        $table->decimal($column, $details['precision'], $details['scale'])->nullable($details['nullable'])->after($details['after']);
                    } else {
                        $table->{$details['type']}($column)->nullable($details['nullable'])->after($details['after']);
                    }
                }
            }
        });
    }
    public function down() {  }
};
