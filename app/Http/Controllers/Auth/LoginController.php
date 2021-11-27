<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/team';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showRegisterForm($id)
    {
        $user = User::find($id);
        return view('/login', ['login' => User::findOrFail($id)]);
    }
    
    /**
     * ログアウトしたときの画面遷移先
     */
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        return redirect()->route('login');
    }
    
    // public function redirectPath()
    // {   
    //     $user = User::all();
    //     return view('team.show');
    // }
    
//     protected function redirectTo() {
//       if(! Auth::user()) {
//           return '/login';
//       }
//       return route('team.show', ['team' => Auth::team_id()]);
//   }
    
}
