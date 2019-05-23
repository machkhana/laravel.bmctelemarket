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
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email', 150);
            $table->string('idnumber', 150 );
            $table->string('banknumber')->nullable();
            $table->date('birthday');
            $table->unsignedInteger('city_id')->nullable();
            $table->text('address');
            $table->text('interes');
            $table->text('work_place');
            $table->integer('family_status');
            $table->integer('card_id');
            $table->integer('position_id');
            $table->date('agremeent_start');
            $table->date('agremeent_end');
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
        Schema::dropIfExists('clients');
    }
}
