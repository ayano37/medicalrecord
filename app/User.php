<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'name', 'email', 'password', 'birthday', 'avatar_image', 'admin_flag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $guarded = array('id');
        public static $rules = array(
            //'team_id' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            
            );
    
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    public function temperatures()
    {
        return $this->hasMany('App\Temperature');
    }
    
    public function weights()
    {
        return $this->hasMany('App\Weight');
    }
    
    public function MenstrualPeriods()
    {
        return $this->hasMany('App\MenstrualPeriod');
    }
    
    public function Injuries()
    {
        return $this->hasMany('App\Injury');
    }

}
