<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function rows()
    {
        return view('dashboard.rows');
    }
    public function subjects()
    {
        return view('dashboard.subjects');
    }
    public function attendance()
    {
        return view('dashboard.attendance');
    }

    public function todayReset()
    {
        return view('dashboard.todayReset');
    }
    public function monthlyReset()
    {
        return view('dashboard.monthlyReset');
    }
    public function students()
    {
        return view('dashboard.students');
    }
    public function teachers()
    {
        return view('dashboard.teachers');
    }

    public function teacherStudent()
    {
        return view('dashboard.teacherStudent');
    }
    public function invoice()
    {
        return view('dashboard.invoice');
    }
    public function members()
    {
        return view('dashboard.members');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
      
}
