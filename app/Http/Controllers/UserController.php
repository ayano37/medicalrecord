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
    public function show($id)
    {
        $user = User::find($id);
        $date = new Carbon();
        $date = Carbon::now();
        
        // if($user->temperatures!=null) {
        // $temperature = $user->temperatures[0];
        // }else {
        $temperature=new Temperature();
        $temperature->temperature=35.0;
            //$temperature=35.0;
        //}
        // $weight = Weight::find($user->id);
        // $menstrual_period_s = MenstrualPeriod::find($user->id);
        // $menstrual_period_f = MenstrualPeriod::find($user->id);
        // $injury = Injury::find($user->id);
        $weight = null;
        $menstrual_period_s = null;
        $menstrual_period_f = null;
        $injury = null;
        
        $endDate = date('t');
        $dates = [];
        for($i = 1; $i <= (int)$endDate; $i++) {
        $dates[] = $i;
        } 
        
        //return view('user.index', ['user' => User::findOrFail($id), 'date'=>$date,'temperature'=>$temperature]);
        return view('user.show', ['user' => User::findOrFail($id), 'date'=>$date,'dates'=>$dates,'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);  
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
