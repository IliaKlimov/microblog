<?php

namespace App\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


trait LoginUser
{

    public function login(Request $request)
    {
        $this->validator($request->all())->validate();

        if ($this->attemptLogin($request)) {
            return redirect($this->redirectTo);
        }
        return redirect()->back()->withErrors(['password' => 'The provided credentials do not match our records.']);
    }

    protected function attemptLogin(Request $request)
    {
        if (Auth::attempt([
                'phone' => $request['phone'],
                'password' => $request['password']
            ],$request->has('remember'))
            || Auth::attempt([
                'email' => $request['email'],
                'password' => $request['password']
            ],$request->has('remember'))){
            return true;
        }
        return false;
    }



}
