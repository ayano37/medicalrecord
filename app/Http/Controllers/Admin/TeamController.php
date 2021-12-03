<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\User;

class TeamController extends Controller
{
    public function add()
  {   
      //$team = Team::all();
      
      return view('admin.team.create');//,['team' => $team]);
  }
  
  
      public function create(Request $request)
    { 
      $team = new Team();
      $form = $request->all();

      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $team->image_path = basename($path);
      } else {
          $team->image_path = null;
      }
      
      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $team->fill($form);
      $team->save();
    
      return redirect('/team');
  
  }
  
    public function edit(Request $request)
  {
      // Team Modelからデータを取得する
      $users = User::all();
      $team = Team::find($request->id);
     
      if (empty($team)) {
        abort(404);    
      }
      
      foreach($users as $user) {
      if ($team->id == $user->team_id && $user->admin_flag == "1"){
        return view('admin.team.edit', ['team_form' => $team]);
      } else {
        return view('errors.403');
      }
      }
  }


    public function update(Request $request)
  {   
      // Team Modelからデータを取得する
      $team = Team::find($request->id);
      // 送信されてきたフォームデータを格納する
      $team_form = $request->all();
      if ($request->remove == 'true') {
          $team_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $team_form['image_path'] = basename($path);
      } else {
          $team_form['image_path'] = $team->image_path;
      }
      
      unset($team_form['image']);
      unset($team_form['remove']);
      unset($team_form['_token']);

      // 該当するデータを上書きして保存する
      $team->fill($team_form)->save();
      
      return redirect()->route('team', [$team]);
  }
  
  public function delete(Request $request)
  {
      // 該当するModelを取得
      $users = User::all();
      $team = Team::find($request->id);
      // 削除する
      $team->delete();
      
      foreach($users as $user) {
      if ($team->id == $user->team_id && $user->admin_flag == "1"){
      return redirect('/team');
      } else {
        return view('errors.403');
      }
      }
  }
}