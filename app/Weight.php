<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','weight'
    ];
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
