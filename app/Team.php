<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team_name','player_name','game_day','image_path']; //保存したいカラム名が複数の場合//
}
