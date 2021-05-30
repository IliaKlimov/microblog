<?php

namespace App\Http\Controllers\Auth;

use App\Traits\Auth\LoginUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use LoginUser;

    protected $redirectTo = '/';

    public function show()
    {
        return response()->view('auth.login');
    }

    protected function validator(array $data)
    {
        $rules = [
            'email' => 'required_without:phone|email|string|nullable',
            'phone' => 'required_without:email|numeric|nullable',
            'password' => 'required',
        ];

        $messages = [
            'email.email' => 'The email must be a valid email address.',
            'email.required_without' => 'Email or phone required',
            'phone.required_without' => 'Email or phone required',
            'phone.numeric' => 'Must be a number.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
