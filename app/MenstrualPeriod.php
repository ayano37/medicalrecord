<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenstrualPeriod extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','menstrual_period_s','menstrual_period_f','target_date'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
