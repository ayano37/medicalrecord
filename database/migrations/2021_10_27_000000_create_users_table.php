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
            $table->bigIncrements('id');
            $table->integer('team_id');
            $table->string('name'); 
            $table->string('email')->unique(); //他のユーザーと被らないようにする
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birthday');
            $table->string('avatar_image')->nullable();
            $table->integer('admin_flag');
            $table->date('target_date');
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
