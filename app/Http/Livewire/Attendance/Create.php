<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Rows;
use App\Models\StudentAttendance;
use App\Models\Students;
use App\Models\StudentSubject;
use App\Models\Subjects;
use App\Models\TeacherAttendance;
use App\Models\Teachers;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $attendance = '';
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
        return view('livewire.attendance.create',[
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

    public function updateAttendance()
    {
        
        $this->validate([
            'attendance' => 'required|integer',
            'subject' => 'required',
            'teacher' => 'required',
        ],[
            'attendance.required' => 'رقم الطالب مطلوب',
            'attendance.integer' => 'رقم الطالب خطأ',
            'teacher.required' => 'المدرس مطلوب',
            'subject.required' => 'المادة مطلوبة',
        ]);

        $student = Students::where('id',$this->attendance)->first();
        $studentSubject = StudentSubject::where('student',$this->attendance)->where('teacher',$this->teacher)->first();
        $month = Carbon::now()->timezone('Africa/Cairo')->format('m');
        $year = Carbon::now()->timezone('Africa/Cairo')->format('Y');
        $day = Carbon::now()->timezone('Africa/Cairo')->format('d');

        $studentAttendance = StudentAttendance::where('student',$this->attendance)->where('day',$day)->where('month',$month)->where('year',$year)->where('subject',$this->subject)->where('teacher',$this->teacher)->first();
        if(!$student){
            session()->flash('danger','لم يتم العثور على هذا الطالب');
            $this->emit('alert_remove');
        }
        else if($student->status == "close"){
            session()->flash('danger','هذا الطالب منفطع');
            $this->emit('alert_remove');
        }
        else if(!$studentSubject){
            session()->flash('danger',' الطالب غير مسجيل هذه المادة');
            $this->emit('alert_remove');
        }
        else if($student->row != $this->row){
            session()->flash('danger',' الطالب لا ينتمي الي هذه المرحلة');
            $this->emit('alert_remove');
        }
        else if($studentAttendance){
            session()->flash('danger','تم حضور الطالب مسبفا فى نفس اليوم والمادة والمدرس');
            $this->emit('alert_remove');
        }else{
            StudentAttendance::create([
                'student'  => $student->id,
                'subject' => $this->subject,
                'teacher'=> $this->teacher,
                'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
            ]);
            $teacherAttendance = TeacherAttendance::where('teacher',$this->teacher)->where('row',$this->row)
            ->where('day',Carbon::now()->timezone('Africa/Cairo')->format('d'))
            ->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))
            ->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'))->first();

            if(!$teacherAttendance){
                TeacherAttendance::create([
                    'teacher'=> $this->teacher,
                    'row'=> $this->row,
                    'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                    'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                    'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
                ]);
            }
            
            $this->emit('row');
            session()->flash('success','تم حضور الطالب : '.$student->name.' بنجاح');
            $this->emit('alert_remove');
        }

        $this->attendance = '';
        
        
    }
}
