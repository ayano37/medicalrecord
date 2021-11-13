<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        //$user = new User();
        //dd(request());
        if (isset($data['image'])) {
        $path = request()->file( 'image')->store('public/image');    
        //$path = $data['image']->store('public/image');
        $avatar_image = basename($path);
      } else {
          $avatar_image = null;
      }
        
        return User::create([
            'name' => $data['name'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar_image' => $avatar_image
        ]);
    }
    
    public function showRegisterForm($id)
    {
        $user = User::find($id);
        return view('/register', ['register' => User::findOrFail($id)]);
    }
    
    public function add()
    {
        $teams = Team::all();
        
        return view('auth.register');
    }
    
}
