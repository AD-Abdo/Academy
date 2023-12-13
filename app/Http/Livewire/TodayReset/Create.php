<?php

namespace App\Http\Livewire\TodayReset;

use App\Models\Rows;
use App\Models\StudentSalarySubjects;
use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;

class Create extends Component
{
    public $teacher = '';
    public $subject = '';
    public $row = '';
    public $date ;

    public function changeSubject($subjectID)
    {
        $this->emit('changeSubject',$this->subject);
        
    }

    public function changeTeacher($teacerID)
    {
        $this->emit('changeTeacher',$this->teacher);
        
    }
    public function changeRow($rowID)
    {
        $this->emit('changeRow',$this->row);
        
    }

    public function changeDate($date)
    {
        $this->emit('changeDate',$date);
        
    }


    public function render()
    {

        $this->emit('changeSubject',$this->subject);
        $this->emit('changeTeacher',$this->teacher);
        $this->emit('changeRow',$this->row);
        $this->emit('changeDate',$this->date);

        return view('livewire.today-reset.create',[
            'teachers' => Teachers::where('subject',$this->subject)->latest()->get(),
            'subjects' => Subjects::latest()->get(),
            'rows' => Rows::latest()->get(),
        ]);
    }
}
