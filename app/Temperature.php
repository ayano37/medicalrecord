<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $guarded = array('id');
    
    protected $fillable = [

        'user_id','temperature','target_date'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
