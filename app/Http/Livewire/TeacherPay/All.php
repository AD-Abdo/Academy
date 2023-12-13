<?php

namespace App\Http\Livewire\TeacherPay;

use App\Models\TeacherAttendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class All extends Component
{
    public $date = '';
    public $row = '';
    public $teacher = '';
    public $subject = '';
    public $pay = 0;
    public $discount = 0;
    public $free = 0;
    public $perDay = 0;

    protected $listeners = ['row'=>'$refresh','changeRow','changeDate','changeTeacher','changeSubject'];

    public function changeSubject($subject)
    {
        $this->subject = $subject;
        $this->teacher =  null;
    }

    public function changeTeacher($teacher)
    {
        $this->teacher = $teacher;
        
    }
    


    public function changeRow($row)
    {
        $this->row = $row;
    }

    public function changeDate($date)
    {
        $this->date = $date;
    }

    public function render()
    {
        
        $month = null;
        $year = null;
        if($this->date != null){
            $date = explode('-',$this->date);
            $year = $date[0];
            $month = $date[1];
        }
        // dd($this->teacher);
        
        return view('livewire.teacher-pay.all',[
            'rows' => TeacherAttendance::where('month',$month)->where('year',$year)->where('teacher',$this->teacher)->where('row',$this->row)->latest()->get(),
            'teacher' => $this->teacher,
            'row' => $this->row,
            'month' => $month,
            'year' => $year,
            'mpay' => $this->pay == null ? 0 : $this->pay ,
            'mdiscount' => $this->discount == null ? 0 : $this->discount ,
            'mfree' => $this->free == null ? 0 : $this->free ,
            'mperDay' => $this->perDay == null ? 0 : $this->perDay 
        ]);
    }
}
