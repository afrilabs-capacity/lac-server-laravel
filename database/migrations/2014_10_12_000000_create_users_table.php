<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names');
            $table->string('status');
            $table->string('qualification'); 
            $table->string('monthly_report');
            $table->integer('state_id')->default(0);
            $table->integer('zone_id')->default(0);
             $table->integer('centre_id')->default(0);
            $table->string('gl');
            $table->string('sex');
            $table->string('phone');
            // $table->string('location');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('token_activated')->default(0)->nullable();
            $table->integer('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
