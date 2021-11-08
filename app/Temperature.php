<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','temperature'
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
}
