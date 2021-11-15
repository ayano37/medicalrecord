<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\User;
use App\Temperature;
use App\Weight;
use App\MenstrualPeriod;
use App\Injury;
use Carbon\Carbon;

class UserController extends Controller
{   
    public function show(Request $request)
    {
        $user = User::find($request->id);
        //$date = new Carbon
        $target_date = $request->target_date ? ($request->target_date) : date('Y-m-d');
        $today = Carbon::today();
        //dd($request->all(), $date);
        
        // if($user->temperatures!=null) {
        // $temperature = $user->temperatures[0];
        // }else {
            //$temperature=35.0;
        //}
        // $weight = Weight::find($user->id);
        // $menstrual_period_s = MenstrualPeriod::find($user->id);
        // $menstrual_period_f = MenstrualPeriod::find($user->id);
        // $injury = Injury::find($user->id);
        // $temperature = $user->temperatureToday();
        // dd($temperature);
        
        $temperature = Temperature::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $weight = Weight::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $menstrual_period_s = \App\MenstrualPeriod::select('menstrual_period_s','updated_at');
        $menstrual_period_s = MenstrualPeriod::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $menstrual_period_f = \App\MenstrualPeriod::select('menstrual_period_f','updated_at');
        $menstrual_period_f = MenstrualPeriod::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $injury = Injury::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        
        //return view('user.index', ['user' => User::findOrFail($id), 'date'=>$date,'temperature'=>$temperature]);
        return view('user.show', ['user' => User::findOrFail($request->id), 'target_date'=>$request->target_date, 'today'=>$today,'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);  
    }
    
    // public function index(Request $request)
    // {   
    //     $date = new Carbon();
    //     $date = Carbon::now();
        
    //     $startDate = date('Y-m-01');
    //     //dd($startDate);
    //     $endDate = date('t');
    //     //dd($endDate);
    //     // $diff = (strtotime($endDate) - strtotime($startDate)) / ( 60 * 60 * 24);
    //     $dates = [];
    //     for($i = 1; $i <= (int)$endDate; $i++) {
    //     $dates[] = $i;
    //     } 
    //     //dd($dates);
    //     // $start = '2021-11-01'; # 開始日時
    //     // $end = '2030-12-31'; # 終了日時
    //     // for ($i = $start; $i <= $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
    //     // echo $i . PHP_EOL;
    //     // }
        
    //     $users = User::all()->sortByDesc('updated_at');
        
    //     if (count($users) > 0) {
    //         $headline = $users->shift();
    //     } else {
    //         $headline = null;
    //     }
        
    //     $temperatures = Temperature::all()->sortByDesc('updated_at');
    //     $temperature=$temperatures->shift();
        
    //     $weights = Weight::all()->sortByDesc('updated_at');
    //     $weight=$weights->shift();
        
    //     $menstrual_periods_s = MenstrualPeriod::get(['menstrual_period_s'])->sortByDesc('updated_at');
    //     $menstrual_period_s=$menstrual_periods_s->shift();
        
    //     $menstrual_periods_f = MenstrualPeriod::get(['menstrual_period_f'])->sortByDesc('updated_at');
    //     $menstrual_period_f=$menstrual_periods_f->shift();
        
    //     $injuries = Injury::all()->sortByDesc('updated_at');
    //     $injury=$injuries->shift();
        
        
        
    //         // また View テンプレートに headline、 users、という変数を渡している
    //     return view('user.index',['headline'=>$headline, 'users'=>$users,'dates'=>$dates,'date'=>$date, 'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);
    // }
    
}
