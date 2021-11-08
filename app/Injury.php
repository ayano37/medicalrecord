<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','injury'
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
