<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

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
    protected function create(Request $request)
    {   
        //$user = new User();
        $data = $request->all();
        //dd($request);
        if (isset($data['image'])) {
        $path = Storage::disk('s3')->put('/',$data['image'],'public');    
        //$path = $data['image']->store('public/image');
        $avatar_image = Storage::disk('s3')->url($path);
      } else {
          $avatar_image = null;
      }
      //dd($avatar_image);
        
        
        return User::create([
            
            'admin_flag' => $data['admin_flag'],
            'team_id' => $data['team_id'],
            'name' => $data['name'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar_image' => $avatar_image
        ]);
    }
    
    public function redirectPath()
    {   
        if (Auth::check()) {
            return $this->redirectTo . '/' . Auth::user()->team_id;
        }
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
    
    public function showRegisterForm($id)
    {
        $user = User::find($id);
        $teams = Team::all();
        return view('/register', ['register' => User::findOrFail($id)]);//->with('teams',$teams);
    }
    
    public function add()
    {
        $teams = Team::all();
        
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
    
}
