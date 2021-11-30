<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Auth;
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
        $login_id = Auth::id();
        $login_user = User::find($login_id);
        $target_date = $request->target_date ? ($request->target_date) : date('Y-m-d');
        $today = Carbon::today();
        
        $temperature = Temperature::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $weight = Weight::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $menstrual_period_s = \App\MenstrualPeriod::select('menstrual_period_s','updated_at');
        $menstrual_period_s = MenstrualPeriod::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $menstrual_period_f = \App\MenstrualPeriod::select('menstrual_period_f','updated_at');
        $menstrual_period_f = MenstrualPeriod::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        $injury = Injury::whereDate('target_date', $target_date)->where('user_id', $user->id)->first();
        
        //return view('user.index', ['user' => User::findOrFail($id), 'date'=>$date,'temperature'=>$temperature]);
        //foreach($users as $user) {
        if (($user->id == $request->id || $login_user->admin_flag == "1") && ($user->team_id == $login_user->team_id)) {
            return view('user.show', ['user' => User::findOrFail($request->id), 'target_date'=>$request->target_date, 'today'=>$today,'temperature'=>$temperature,'weight'=>$weight,'menstrual_period_s'=>$menstrual_period_s,'menstrual_period_f'=>$menstrual_period_f,'injury'=>$injury]);
        } else {
            return view('errors.403');
        }
        //}
    }
    
    public function showWeight(Request $request)
    {   
        $user = User::find($request->id);
        $date = isset($request->target_date) ? new Carbon($request->target_date) : Carbon::today();
        $days = date('t', strtotime($date));
        
		//該当月の体重データを取り出す
		$weights = Weight::whereMonth('target_date', $date)->where('user_id', $user->id)->get();
		$weight_log = [];
		foreach($weights as $weight) {
		    $weight_log[] = $weight->weight;
		}
		//該当つきの日付を取り出す
		$date_log = [];
		foreach($weights as $target_date) {
		    $date_log[] = $target_date->target_date;
		}
		
		//Viewにデータを渡す
		return view('user.showWeight',[
		"label" => $date_log,
		'user'=>User::findOrFail($request->id),'weight_log' => $weight_log, 'date_log' =>$date_log]);
	}
	
	public function showTemperature(Request $request)
	{
	    $user = User::find($request->id);
	    $date = isset($request->target_date) ? new Carbon($request->target_date) : Carbon::today();
	    
	    //該当月の体重データを取り出す
	    $temperatures = Temperature::whereMonth('target_date', $date)->where('user_id', $user->id)->get();
		$temperature_log = [];
		foreach($temperatures as $temperature) {
		    $temperature_log[] = $temperature->temperature;
		}
		//該当つきの日付を取り出す
		$date_log = [];
		foreach($temperatures as $target_date) {
		    $date_log[] = $target_date->target_date;
		}
	    
	    return view('user.showTemperature', [
	    "label" => $date_log,
	    'user'=>User::findOrFail($request->id), 'temperature_log'=>$temperature_log,'date_log'=>$date_log]);
	}
	
	public function showInjury(Request $request)
	{   
	    $user = User::find($request->id);
	    $date = isset($request->target_date) ? new Carbon($request->target_date) : Carbon::today();
	    
	    $injuries = Injury::whereMonth('target_date', $date)->where('user_id', $user->id)->get();
	    
	    return view('user.showInjury', ['user'=>User::findOrFail($request->id), 'injuries'=>$injuries]);
	}
	
	public function showMenstrualPeriod(Request $request)
	{
	    $user = User::find($request->id);
	    $date = isset($request->target_date) ? new Carbon($request->target_date) : Carbon::today();
	    $menstrual_periods = MenstrualPeriod::whereMonth('target_date', $date)->where('user_id', $user->id)->get();
	    
	   // if($menstrual_periods->menstrual_period_s != null) {
	   //     $menstrual_periods = MenstrualPeriod::whereMonth('target_date', $date)->where('user_id', $user->id)->get();
	   // } else {
	        
	   // }
	    
	    return view('user.showMenstrualPeriod',['user'=>User::findOrFail($request->id), 'menstrual_periods'=>$menstrual_periods]);
	}
}
