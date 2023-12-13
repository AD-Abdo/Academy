<?php

namespace App\Http\Livewire\MonthReset;

use App\Models\Rows;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;

class Create extends Component
{
    public $student = '';
    public $row = '';
    public $date ;
    public $teacher = '';
    public $subject = '';

    public function changeSubject($subjectID)
    {
        $this->emit('changeSubject',$this->subject);
        
    }

    public function changeTeacher($teacerID)
    {
        $this->emit('changeTeacher',$this->teacher);
        
    }

    public function changeStudent($studentID)
    {
        $this->emit('changeStudent',$this->student);
        
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
        $this->emit('changeStudent',$this->student);
        $this->emit('changeRow',$this->row);
        $this->emit('changeDate',$this->date);
        return view('livewire.month-reset.create',[
            'teachers' => Teachers::where('subject',$this->subject)->latest()->get(),
            'subjects' => Subjects::latest()->get(),
            'students' => Students::where('row',$this->row)->latest()->get(),
            'rows' => Rows::latest()->get(),
        ]);
    }
}
