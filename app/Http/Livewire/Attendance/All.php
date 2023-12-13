<?php

namespace App\Http\Livewire\Attendance;

use App\Models\StudentAttendance;
use App\Models\Students;
use App\Models\StudentSalary;
use App\Models\StudentSalarySubjects;
use App\Models\Subjects;
use App\Models\Teachers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class All extends Component
{
    public $teacher = '';
    public $subject = '';
    public $date = '';
    public $row = '';

    public $student = '';
    public $price = 0;
    public $selectedSubjects = [];
    protected $listeners = ['row'=>'$refresh','changeSubject','changeTeacher','changeRow'];

    public function changeSubject($subject)
    {
        $day = now()->day();
        $month = now()->month();
        $year = now()->year();
        $this->date = $year.'-'.$month.'-'.$day;
        $this->subject = $subject;
    }

    public function changeTeacher($teacher)
    {
        $this->teacher = $teacher;
        $this->date = date('Y-m-d');
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
        $day = Carbon::now()->timezone('Africa/Cairo')->format('d');
        $month = Carbon::now()->timezone('Africa/Cairo')->format('m');
        $year = Carbon::now()->timezone('Africa/Cairo')->format('Y');
        
        return view('livewire.attendance.all',[
            'rows' => StudentAttendance::where('day',$day)->where('month',$month)->where('year',$year)->whereHas('Student',function (Builder $query){
                $query->where('row',$this->row);
            })->where('subject',$this->subject)->where('teacher',$this->teacher)->latest()->get(),
            'teacher' => $this->teacher,
            'row' => $this->row,
            'day' => $day,
            'month' => $month,
            'year' => $year,
        ]);
    }


    public function delete($id)
    {
        $row = StudentAttendance::where('id',$id)->first();
        if($row){
            $row->delete();
        }
        session()->flash('success','تم حذف حضور الطالب بنجاح');
        $this->emit('alert_remove');
    }

    public function pay($student,$sarlary = null)
    {
        $this->validate([
            'price' => 'required|integer|min:1',
            'selectedSubjects' => 'required|min:1',
        ],[
            'price.required' => 'المبلغ مطلوب',
            'price.integer' => 'المبلغ خطأ',
            'price.min' => 'المبلغ مطلوب',
            'selectedSubjects.required' => 'المواد مطلوبه',
            'selectedSubjects.min' => 'المواد مطلوبه',
        ]);

        $subjects = [];
        $findStudent = Students::where('id',$student)->first();
        if(in_array('all',$this->selectedSubjects)){
            foreach ($findStudent->Subjects as $subject) {
                array_push($subjects, $subject->teacher);
            }
            
            
        }else{
            $subjects = $this->selectedSubjects;
        }
        if($findStudent->status == "perDay"){
            $findSarlary =StudentSalary::create([
                'student' => $student,
                'price' => $this->price,
                'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
            ]);
    
            foreach($subjects as $teacher){
                StudentSalarySubjects::create([
                    'salary' => $findSarlary->id,
                    'teacher' => $teacher,
                    'price' => $this->price,
                    'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                    'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                    'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
                    
                ]);
            }
        }else{

        
            $findSarlary = StudentSalary::where('id',$sarlary)->first();
            if($findSarlary){
                $findSarlary->update([
                    'student' => $student,
                    'price' => $findSarlary->price + $this->price,

                ]);

                foreach($subjects as $index => $teacher){
                    StudentSalarySubjects::create([
                        'salary' => $findSarlary->id,
                        'teacher' => $teacher,
                        'price' => $this->price,
                        'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                        'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                        'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
                    ]);
                    
                    
                }

            }else{
                $findSarlary =StudentSalary::create([
                    'student' => $student,
                    'price' => $this->price,
                    'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                    'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                    'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
                ]);
        
                foreach($subjects as $teacher){
                    StudentSalarySubjects::create([
                        'salary' => $findSarlary->id,
                        'teacher' => $teacher,
                        'price' => $this->price,
                        'day' => Carbon::now()->timezone('Africa/Cairo')->format('d'),
                        'month' => Carbon::now()->timezone('Africa/Cairo')->format('m'),
                        'year' => Carbon::now()->timezone('Africa/Cairo')->format('Y')
                        
                    ]);
                }
            }
        }
        
        
        
        $this->student = '';
        $this->price = 0;
        $this->selectedSubjects = [];

        session()->flash('success','تم دفع مصاريف الطالب بنجاح');
        $this->emit('alert_remove');
    }


    


    
   
}
