<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('zone_id');
            $table->integer('state_id');
            $table->integer('centre_id')->default(0);
            $table->string('regno');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->integer('age');
            $table->string('marital_status');
            $table->string('occupation');
            $table->string('state_of_origin');
            $table->string('case_type');
            $table->string('offence')->nullable();
            $table->string('complaints')->nullable();
            $table->string('court');
            $table->string('case_no');
            $table->date('date_case_received')->nullable();
            $table->date('date_case_granted')->nullable();
            $table->string('granted');
            $table->string('eligible');
            $table->string('active_case');
            $table->string('counsel_assigned');
            $table->date('date_case_completed');
            $table->string('completed_case');
            $table->string('case_outcome');
            $table->string('resolution');
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
        Schema::dropIfExists('monthly_report');
    }
}
