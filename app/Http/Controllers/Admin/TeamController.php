<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;

class TeamController extends Controller
{
    public function add()
  {
      return view('admin.team.create');
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

      return redirect('/');
  }
  
    public function edit(Request $request)
  {
      // Team Modelからデータを取得する
      $team = Team::find($request->id);
      if (empty($team)) {
        abort(404);    
      }
      return view('admin.team.edit', ['team_form' => $team]);
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

      return redirect('/');
  }
  
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $team = Team::find($request->id);
      // 削除する
      $team->delete();
      return redirect('/');
  }
}