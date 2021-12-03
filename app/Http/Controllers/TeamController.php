<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{   
    public function show(Request $request)
    {   
        $team = Team::find($request->id);
        $users = User::all();
        // team/edit.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('team.show', ['team' => Team::findOrFail($request->id), 'team' => $team, 'users' => $users]);
    }
    
    public function index(Request $request)
  {     
        $teams = Team::all()->sortByDesc('updated_at');
        
      return view('team.index', ['teams' => $teams]);
  }
}
