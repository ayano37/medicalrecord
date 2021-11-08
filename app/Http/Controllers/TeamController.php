<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Team;
use App\User;

class TeamController extends Controller
{
    public function show(Request $request)
    {   
        $teams = Team::all()->sortByDesc('updated_at');
        $users = User::all();
        // team/edit.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('team.show',['teams' => $teams, 'users' => $users]);
    }
}
