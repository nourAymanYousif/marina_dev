<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('invoices', function (Blueprint $table) {
            $table->enum('payment_method', ['Visa', 'Cash', 'Bank Transfer', 'Vodafone Cash', 'Other']);

            $table->float('paid_amount');


            $table->boolean('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
