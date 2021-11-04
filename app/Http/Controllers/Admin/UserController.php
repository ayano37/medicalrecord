<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\User;
use App\Temperature;
use App\Weight;
use App\MenstrualPeriod;
use App\Injury;

class UserController extends Controller
{
   public function add(Request $request)
  {
      $teams = Team::all();
    
      return view('admin.user.create',compact('teams'));
  }
  
  public function create(Request $request)
  {   
      $this->validate($request, User::$rules);
      $user = new User();
      $temperature = new Temperature();
      $weight = new Weight();
      $menstrual_period = new MenstrualPeriod();
      $injury = new Injury();
      $form = $request->all();
      
      $team_id = $user->team_id;
      
      //$user = User::find($request->team_id);
      //if (empty($user)) {
        //abort(404);    
      //}
      
      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $user->avatar_image = basename($path);
      } else {
          $user->avatar_image = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $user->fill($form);
      $user->save();
      
      $temperature->user_id=$user->id;
      $temperature->temperature=$request->temperature;
      $temperature->save();
      
      $weight->user_id=$user->id;
      $weight->weight=$request->weight;
      $weight->save();
      
      $menstrual_period->user_id=$user->id;
      $menstrual_period_s->menstrual_period_s=$request->menstrual_period_s;
      $menstrual_period_f->menstrual_period_f=$request->menstrual_period_f;
      $menstrual_period_s->save();
      $menstrual_period_f->save();
      
      $injury->user_id=$user->id;
      $injury->injury=$request->injury;
      $injury->save();

      return redirect('admin/user/create', compact('team_id'));
  }
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $user = User::find($request->id);
      if (empty($user)) {
        abort(404);    
      }
      return view('admin.user.edit', ['user_form' => $user]);
  }

  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, User::$rules);
      // User Modelからデータを取得する
      $user = User::find($request->id);
      // 送信されてきたフォームデータを格納する
  
      $user_form = $request->all();
      if ($request->remove == 'true') {
          $user_form['avatar_image'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $user_form['avatar_image'] = basename($path);
      } else {
          $user_form['avatar_image'] = $user->avatar_image;
      }
      
      unset($user_form['_token']);
      unset($news_form['image']);
      unset($news_form['remove']);

      // 該当するデータを上書きして保存する
      $user->fill($user_form)->save();

      return redirect('/user');
  }
  
  public function delete(Request $request)
  {
      // 該当するUser Modelを取得
      $user = User::find($request->id);
      // 削除する
      $user->delete();
      return redirect('/user');
  }
}
