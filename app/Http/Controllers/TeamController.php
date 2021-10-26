<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {   
        $posts = Team::all()->sortByDesc('updated_at');
        // team/edit.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('team.index',['posts' => $posts]);
    }
}
