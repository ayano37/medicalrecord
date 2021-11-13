<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','injury','target_date'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
