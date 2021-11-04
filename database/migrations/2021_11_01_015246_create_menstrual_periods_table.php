<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenstrualPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menstrual_periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('menstrual_period_s')->nullable();
            $table->date('menstrual_period_f')->nullable();
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
        Schema::dropIfExists('menstrual_periods');
    }
}
