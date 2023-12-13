<?php

namespace App\Http\Livewire\MonthReset;

use App\Models\StudentAttendance;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class All extends Component
{
    public $student = '';
    public $date = '';
    public $row = '';
    public $teacher = '';
    public $subject = '';

    protected $listeners = ['row'=>'$refresh','changeStudent','changeRow','changeDate','changeTeacher','changeSubject'];

    public function changeSubject($subject)
    {
        $this->subject = $subject;
    }

    public function changeTeacher($teacher)
    {
        $this->teacher = $teacher;
        
    }

    public function changeStudent($student)
    {
        $this->student = $student;
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
        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#input-here'
        ]);

        $month = null;
        $year = null;
        if($this->date != null){
            $date = explode('-',$this->date);
            $year = $date[0];
            $month = $date[1];
        }
        return view('livewire.month-reset.all',[
            'rows' => StudentAttendance::where('student',$this->student)->where('teacher',$this->teacher)
            ->where('month',$month)->where('year',$year)->where('subject',$this->subject)->whereHas('Student',function(Builder $query){
                $query->where('row',$this->row);
            })->latest()->get(),
        ]);
    }
}
