<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('occupation');
            $table->string('offence');
            $table->string('pod');
            $table->string('date_arrested');
            $table->string('date_released');
            $table->string('duration');
            $table->string('counsel_assigned');
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
        Schema::dropIfExists('pdss');
    }
}
