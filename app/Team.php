<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team_name','game_day','image_path']; //保存したいカラム名が複数の場合//
    
    public static function selectlist()
{
    $teams = Team::all();
    $list = array();
    $list += array( "" => "選択してください" ); //selectlistの先頭を空に
    foreach ($teams as $team) {
       $list += array( $team->team_name => $team->team_name );
    }
    return $list;
}

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
