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
            $table->bigInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('idnumber' );
            $table->string('banknumber')->nullable();
            $table->date('birthday');
            $table->bigInteger('city_id')->unsigned()->index();
            $table->text('address');
            $table->text('interes');
            $table->text('work_place');
            $table->string('family_status');
            $table->string('card_id');
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
