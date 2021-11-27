<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'name', 'email', 'password', 'birthday', 'avatar_image', 'admin_flag','target_date'
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
    
    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
