<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_report', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('sno');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->integer('age');
            $table->string('occupation');
            $table->string('granted');
            $table->string('case_type');
            $table->string('offence')->nullable();
            $table->string('complaints')->nullable();
            $table->string('location');
            $table->string('bail_status');
            $table->string('outcome');
            $table->string('photo_one')->nullable();
            $table->string('photo_two')->nullable();
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
        Schema::dropIfExists('daily_report');
    }
}
