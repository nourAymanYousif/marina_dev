<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'invoices_user_id_foreign')->references('id')->on('client');

            $table->unsignedInteger('boat_id');

            $table->foreign('boat_id', 'invoices_boat_id_foreign')->references('id')->on('boats');

            $table->string('rate');

            $table->string('tax');


            $table->date('issue_date');

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
        Schema::dropIfExists('invoices');
    }
}
