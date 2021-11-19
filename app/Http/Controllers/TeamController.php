<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{   
    public function add(Request $request)
    {
        return view('/team');
    }
    
    public function show(Request $request)
    {   
        $user = Auth::user();
        //dd($user);
        //$user = auth()->user();
        //$team_id = $user->team_id;
        //$id = Auth::user()->team_id;
        $team = Team::find($request->id);
        //dd($team);
        $teams = Team::all()->sortByDesc('updated_at');
        $users = User::all();
        // team/edit.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('team.show',['teams' => $teams, 'users' => $users]);
    }
    
    public function index(Request $request)
  {     
        $teams = Team::all()->sortByDesc('updated_at');
        //dd($teams);
        
      return view('team.index', ['teams' => $teams]);
  }
}
