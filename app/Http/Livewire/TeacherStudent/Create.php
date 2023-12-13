<?php

namespace App\Http\Livewire\TeacherStudent;

use App\Models\Rows;
use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;

class Create extends Component
{

    public $teacher = '';
    public $subject = '';
    public $row = '';


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

        return view('livewire.teacher-student.create',[
            'teachers' => Teachers::where('subject',$this->subject)->latest()->get(),
            'subjects' => Subjects::latest()->get(),
            'rows' => Rows::latest()->get(),
        ]);
    }

    public function changeSubject($subjectID)
    {
        $this->emit('changeSubject',$this->subject);
        
    }

    public function changeTeacher($teacerID)
    {
        $this->emit('changeSubject',$this->subject);
        $this->emit('changeTeacher',$this->teacher);
        
    }
    public function changeRow($rowID)
    {
        $this->emit('changeSubject',$this->subject);
        $this->emit('changeTeacher',$this->teacher);
        $this->emit('changeRow',$this->row);
        
    }

}
