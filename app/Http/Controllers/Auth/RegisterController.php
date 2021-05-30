<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Traits\Auth\RegistersUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUser;

    protected $redirectTo = '/';

    public function show()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        $rules = [
            'email' => ['required_without:phone', 'string', 'email', 'max:255', 'unique:users', 'nullable'],
            'phone' => ['required_without:email', 'numeric', 'unique:users', 'nullable'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];

        $messages = [
            'email.required_without' => 'Email or phone required',
            'phone.required_without' => 'Email or phone required',
            'phone.numeric' => 'Must be a number',
            'password.min' => 'Password must be >6 characters'
        ];

        return Validator::make($data, $rules, $messages);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
