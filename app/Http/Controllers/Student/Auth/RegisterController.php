<?php

namespace App\Http\Controllers\Student\Auth;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/student/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showRegistrationForm()
    {
        return view('auth.student.register');
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
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'education' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Teacher
     */
    protected function create(array $data)
    {
        return Student::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'education' => $data['education'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => NULL
        ]);
    }


    public function register(Request $request)
    {

       $this -> validator($request->all())->validate();

        try{
            $this->create($request->all());
        }catch (\Exception $exception){
            logger()->error($exception);
            return redirect()
                ->back()
                ->withInput( $request->except('password'));
        }

        //$this->guard()->login($user);

        return redirect($this->redirectTo);

    }
}
