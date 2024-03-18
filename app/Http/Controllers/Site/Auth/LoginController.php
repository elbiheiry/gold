<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest.site', ['except' => 'getLogout' ]);
    }

    public function getLogin() {
        return view('site.auth.login');
    }

    public function postLogin(Request $request) {
        $v = validator($request->all() ,[
            'username' => 'required',
            'password' => 'required'
        ] ,[
            'username.required' => 'Please enter your email',
            'password.required' => 'Please enter your password'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $name = $request->input('username');
        $password = $request->input('password');
        $member = Member::where('email', $name)->first();

        if ($member && Hash::check($password, $member->password)) {

            Auth::guard('site')->login($member, $request->has('remember'));
            return ['status' => 'success' ,'data' => ['You have been logged in successfully'] ,'url' => route('site.index')];
        } else {
            return ['status' => 'error' ,'data' => ['Email or password isn\'t correct']];
        }
    }

    /**
     * Logout The user
     */
    public function getLogout() {
        Auth::guard('site')->logout();
        return redirect('/login');
    }

    public function postRegister(Request $request) {
        // 1- Validator::make()
        // 2- check if fails
        // 3- fails redirect or success not redirect
        $v = validator($request->all() ,[
            'username' => 'required',
            'email' => 'required|unique:members',
            'password' => 'required|min:6',
            'confirm_password' => 'same:password'
        ] ,[
            'username.required' => 'Pleas enter your name',
            'email.required' => 'Please enter your email',
            'email.unique' => 'This email is already a member',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password should be at least 6 characters',
            'confirm_password.same' => 'Password mismatch',
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $member = new Member();

        $member->name = $request->username;
        $member->email = $request->email;
        $member->password = bcrypt($request->password);

        if ($member->save()){
            Auth::guard('site')->login($member);

            return ['status' => 'success' ,'data' => ['You have been logged in successfully'] ,'url' => route('site.index')];
        }else{
            return ['status' => 'error' ,'data' => ['Error ! Please try again in few minutes']];
        }
    }
}
