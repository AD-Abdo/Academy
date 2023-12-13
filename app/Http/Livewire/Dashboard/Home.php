<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Students;
use App\Models\Teachers;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $studens = Students::count();
        $todayStudens = Students::whereDate('created_at',Carbon::now()->timezone('Australia/Sydney')->format('Y-m-d'))->count();
        $teachers = Teachers::count();
        $todayTeachers = Teachers::whereDate('created_at',Carbon::now()->timezone('Australia/Sydney')->format('Y-m-d'))->count();
        $TeacherSubjects = Teachers::latest()->get();

        return view('livewire.dashboard.home',[
            'studens' => $studens,
            'todayStudens' => $todayStudens,
            'teachers' => $teachers,
            'todayTeachers' => $todayTeachers,
            'TeacherSubjects' => $TeacherSubjects
        ]);
    }
}
