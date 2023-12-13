<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Setup()
    {
        if(User::count() > 0 ){
            return redirect()->route('login');
        }
        return view('setup.setup');
    }

    public function SaveSetup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ],[
            'name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تحتوي على اكثر من 8 احرف او ارقام',
            'password.max' => 'كلمة المرور يجب ان تحتوي على اقل من 16 احرف او ارقام'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Admin'
        ]);
        Auth::attempt(['email' => $request->email,'password'=>$request->password]);
        return redirect()->route('dashboard.index');
        
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }
        return view('setup.login');
    }

    public function SignIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',
        ]);

        if(Auth::attempt(['email' => $request->email,'password'=>$request->password])){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->route('login')->with(['error'=>'فشل تسجيل الدخول الرجاء التاكد من البريد الالكتروني او كلمة المرور']);
        }

    }
}
