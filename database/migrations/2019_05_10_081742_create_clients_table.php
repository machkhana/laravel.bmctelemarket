<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigIncrements('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('idnumber' );
            $table->string('banknumber')->nullable();
            $table->date('birthday');
            $table->unsignedBigInteger('city_id');
            $table->text('address');
            $table->text('interes');
            $table->text('work_place');
            $table->string('family_status');
            $table->string('card_id');
            $table->integer('position_id');
            $table->date('agremeent_start');
            $table->date('agremeent_end');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
