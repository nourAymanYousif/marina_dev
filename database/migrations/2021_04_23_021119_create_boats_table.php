<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->float('length');

            $table->string('images');

            $table->string('color');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'boats_user_id_foreign')->references('id')->on('client');



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
        Schema::dropIfExists('boats');
    }
}
