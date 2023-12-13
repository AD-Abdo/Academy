<?php

namespace App\Http\Livewire\TodayReset;

use App\Models\StudentSalarySubjects;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class All extends Component
{
    public $teacher = '';
    public $subject = '';
    public $date = '';
    public $row = '';
    public $total = 0;
    public $pay = 0;
    public $free = 0;
    public $discount = 0;
    public $perDay = 0;
    
    protected $listeners = ['row'=>'$refresh','changeSubject','changeTeacher','changeRow','changeDate'];
    public function changeSubject($subject)
    {
        $this->subject = $subject;
        
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
        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#input-here'
        ]);
        $day = null;
        $month = null;
        $year = null;


        if($this->date != null){
            $date = explode('-',$this->date);
            $day = $date[2];
            $month = $date[1];
            $year = $date[0];

        }
        return view('livewire.today-reset.all',[
            'rows' => StudentSalarySubjects::where('teacher',$this->teacher)->whereHas('Teacher',function(Builder $query){
                $query->whereHas('Subject',function(Builder $query){
                    $query->where('id',$this->subject);
                });
            })->where('day',$day)
            ->where('month',$month)->where('year',$year)->whereHas('Salary',function(Builder $query){
                $query->whereHas('Student',function(Builder $query){
                    $query->where('row',$this->row);
                });
            })->latest()->get(),
            'total' => $this->total,
            'free' => $this->free,
            'discount' => $this->discount,
            'perDay' => $this->perDay,
            'pay' => $this->perDay,
        ]);
    }
}
