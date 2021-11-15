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
use Carbon\Carbon;

class UserController extends Controller
{
  public function add(Request $request)
  {   
      //dd($request->id);
      $teams = Team::all();
      $user = User::find($request->id);
      $temperature = Temperature::find($request->id);
      $weight = Weight::find($request->id);
      $menstrual_period_s = MenstrualPeriod::find($request->id);
      $menstrual_period_f = MenstrualPeriod::find($request->id);
      $injury = Injury::find($request->id);
    
      return view('admin.user.create',['user'=>$user,'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);
  }
  
  public function create(Request $request)
  {   
      
      $user = User::find($request->id);
      
      $temperature = new Temperature();
      $weight = new Weight();
      $menstrual_period = new MenstrualPeriod();
      $injury = new Injury();
      $form = $request->all();
      
      // データベースに保存する
      $temperature->fill($form);
      $temperature->user_id=$user->id;
      $temperature->temperature=$request->temperature;
      $temperature->target_date=$request->target_date;
      dd($temperature);
      $temperature->save();
      
      $weight->user_id=$user->id;
      $weight->weight=$request->weight;
      $weight->target_date=$request->target_date;
      $weight->save();
      
      $menstrual_period->user_id=$user->id;
      $menstrual_period->menstrual_period_s=$request->menstrual_period_s;
      $menstrual_period->menstrual_period_f=$request->menstrual_period_f;
      $menstrual_period->target_date=$request->target_date;
      $menstrual_period->save();
      
      $injury->user_id=$user->id;
      $injury->injury=$request->injury;
      $injury->target_date=$request->target_date;
      $injury->save();
      
      unset($form['_token']);
  
      // $id = $user->id;
      // return redirect('/user/{id}');
      return redirect()->route('user', [$user]);
  }
  
  public function edit(Request $request)
  {   
      //dd($request->all());
      $user = User::find($request->id);
      $date = isset($request->target_date) ? new Carbon($request->target_date) : Carbon::today();
      //dd($date);
      //$target_date = $request->target_date;
      //$form = $request->all();
      //dd($form);
      //$target_date = $request->target_date;
      //dd($target_date);
      
      $temperature = Temperature::whereDate('target_date', $date)->where('user_id', $user->id)->first();
      $weight = Weight::whereDate('target_date', $date)->where('user_id', $user->id)->first();
      $menstrual_period_s = \App\MenstrualPeriod::select('menstrual_period_s','updated_at');
      $menstrual_period_s = MenstrualPeriod::whereDate('target_date', $date)->where('user_id', $user->id)->first();
      $menstrual_period_f = \App\MenstrualPeriod::select('menstrual_period_f','updated_at');
      $menstrual_period_f = MenstrualPeriod::whereDate('target_date', $date)->where('user_id', $user->id)->first();
      $injury = Injury::whereDate('target_date', $date)->where('user_id', $user->id)->first();
      
      return view('admin.user.edit', ['user'=>User::findOrFail($request->id), 'target_date'=>$date->format('Y-m-d'),'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);
  }

  public function update(Request $request)
  {   
      //dd($request);
      // Validationをかける
      //$this->validate($request, User::$rules);
      // User Modelからデータを取得する
      $user = User::find($request->id);
      $date = $request->target_date;
      //dd($date);
      $temperature = Temperature::find($request->id);
      //dd($temperature);
      $weight = Weight::find($request->id);
      $menstrual_period_s = MenstrualPeriod::find($request->id);
      $menstrual_period_f = MenstrualPeriod::find($request->id);
      $injury = Injury::find($request->id);
      //dd($injury);
      
      //dd($date);
      
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      //dd($form);
      //dd($temperature_form);
      
      unset($form['_token']);

      // 該当するデータを上書きして保存する
      $temperature->fill($form)->save();
      //$temperature->target_date = Carbon::parse($request->target_date)->toDateString();
      //dd($temperature);
      //
      $weight->fill($form)->save();
      $menstrual_period_s->fill($form)->save();
      $menstrual_period_f->fill($form)->save();
      $injury->fill($form)->save();

      return redirect()->route('user', [$user]);
  }
  
  // public function delete(Request $request)
  // {
  //     // 該当するUser Modelを取得
  //     $user = User::find($request->id);
  //     // 削除する
  //     $user->delete();
  //     return redirect('/user');
  // }
}
