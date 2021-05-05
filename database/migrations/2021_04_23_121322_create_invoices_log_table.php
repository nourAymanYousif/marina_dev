<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_log', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('invoice_id');

            $table->foreign('invoice_id', 'invoices_log_invoice_id_foreign')->references('id')->on('invoices');


            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'invoices_log_user_id_foreign')->references('id')->on('users');


            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'invoices_log_client_id_foreign')->references('id')->on('client');

            $table->unsignedInteger('boat_id');

            $table->foreign('boat_id', 'invoices_log_boat_id_foreign')->references('id')->on('boats');



            $table->string('paid_amount');

            $table->string('payment_method');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_log');
    }
}
