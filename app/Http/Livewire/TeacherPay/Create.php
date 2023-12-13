<?php

namespace App\Http\Livewire\TeacherPay;

use App\Models\Rows;
use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;

class Create extends Component
{
    public $row = '';
    public $date ;
    public $teacher = '';
    public $subject = '';

    public function changeSubject($subjectID)
    {
        $this->emit('changeSubject',$this->subject);
        $this->changeTeacher('');
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
        

        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#input-here'
        ]);
       
        $this->emit('changeSubject',$this->subject);
        $this->emit('changeTeacher',$this->teacher);
        $this->emit('changeRow',$this->row);
        $this->emit('changeDate',$this->date);
        return view('livewire.teacher-pay.create',[
            'teachers' => Teachers::where('subject',$this->subject)->latest()->get(),
            'subjects' => Subjects::latest()->get(),
            'rows' => Rows::latest()->get(),
        ]);
    }
}
