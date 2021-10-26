<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('team_name')->nullable(); //チーム名を保存するカラム
            $table->string('player_name')->nullable(); //選手名を保存するカラム
            $table->string('image_path')->nullable(); //チームロゴを保存するカラム（画像のパスは空でも保存可）
            $table->string('game_day')->nullable(); //試合日程を保存するカラム
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
        Schema::dropIfExists('teams');
    }
}
