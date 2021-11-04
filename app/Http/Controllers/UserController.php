<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\User;
use App\Temperature;
use App\Weight;
use App\MenstrualPeriod;
use App\Injury;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $posts = User::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        // team/edit.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('user.index',['headline' => $headline,'users' => $users]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        return view('/user.', ['user' => User::findOrFail($id)]);  
    }
}
