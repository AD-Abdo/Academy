<?php

namespace App\Http\Livewire\TeacherStudent;

use App\Models\Students;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $teacher = '';
    public $subject = '';
    public $row = '';

    protected $listeners = ['changeSubject','changeTeacher','changeRow'];

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
    public function render()
    {
        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#input-here'
        ]);
        return view('livewire.teacher-student.all',[
            'rows' => Students::whereHas('Subjects',function(Builder $query){
                $query->where('teacher',$this->teacher);
            })->where('row',$this->row)->latest()->paginate(10),
            'teacher' => $this->teacher,
            'row' => $this->row,
        ]);
    }
}
