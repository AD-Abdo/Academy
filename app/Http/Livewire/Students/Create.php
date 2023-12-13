<?php

namespace App\Http\Livewire\Students;


use App\Models\Rows;
use App\Models\Students;
use App\Models\StudentSubject;
use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;
use Picqer\Barcode\BarcodeGeneratorPNG;


class Create extends Component
{

    public $name = '';
    public $phone = '';
    public $parentPhone = '';
    public $status = '';
    public $row = '';
    public $pid; 
    public $barcode= '';
    public $selectedTeachers = [];


    
    
    public function render()
    {
        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#input-here'
        ]);


        $rows = Rows::latest()->get();
        $teachers = Teachers::latest()->get();
        return view('livewire.students.create',[
            'barcode' => $this->barcode,
            'name' => $this->name,
            'pid' => $this->pid,
            'rows' => $rows,
            'teachers' =>$teachers
        ]);
    }

    protected $listeners = ['edit'];
    


    public function edit($id)
    {
        $this->selectedTeachers=[];
        $row = Students::where('id',$id)->first();
        $this->name = $row->name;
        $this->phone = $row->phone;
        $this->parentPhone = $row->parentPhone;
        $this->status = $row->status;
        $this->row = $row->row;
        $this->pid = $row->id;
        $this->barcode = $row->barcode;

        foreach ($row->Subjects as $studentSubject) {
            array_push($this->selectedTeachers,$studentSubject->teacher);
        }
        


    }

    

    public function cancel()
    {
        $this->name = '';
        $this->phone = '';
        $this->parentPhone = '';
        $this->status = '';
        $this->row = '';
        $this->pid = null;
        $this->selectedTeachers = [];

    }

    public function update()
    {
        
        $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'parentPhone' => 'required|numeric',
            'status' => 'required|in:pay,free,discount,perDay,close',
            'row' => 'required',
        ],[
            'name.required' => 'اسم الطالب مطلوب',
            'phone.required' => 'رقم هاتف الطالب مطلوب',
            'phone.numeric' => 'رقم هاتف الطالب خطأ',
            'parentPhone.required' => 'رقم هاتف ولي الامر مطلوب',
            'parentPhone.numeric' => 'رقم هاتف ولي الامر خطأ',
            'status.required' => 'حالة الطالب مطلوبة',
            'status.in' => 'حالة الطالب خطأ',
            'row.required' => 'المرحللة الدراسية مطلوبة',


            
        ]);
    
        $row = Students::where('id',$this->pid)->first();
        if($row){
            $row->update([
                'name'  => $this->name,
                'phone' => $this->phone,
                'parentPhone' => $this->parentPhone,
                'status' => $this->status,
                'row' => $this->row,
            ]);
            foreach (StudentSubject::where('student',$this->pid)->get() as $studentSubject) {
                $studentSubject->delete();
            }
            
    
            foreach($this->selectedTeachers as $teacher){
                StudentSubject::create([
                    'student' => $row->id,
                    'teacher' => $teacher
                ]);
            }
        }
        
            
        
        $this->name = '';
        $this->phone = '';
        $this->parentPhone = '';
        $this->status = '';
        $this->row = '';
        $this->pid = null;
        $this->selectedTeachers = [];
        $this->emit('row');
        session()->flash('success','تم تعديل بيانات الطالب بنجاح');
        $this->emit('alert_remove');
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'parentPhone' => 'required|numeric',
            'status' => 'required|in:pay,free,discount,perDay,close',
            'row' => 'required',
        ],[
            'name.required' => 'اسم الطالب مطلوب',
            'phone.required' => 'رقم هاتف الطالب مطلوب',
            'phone.numeric' => 'رقم هاتف الطالب خطأ',
            'parentPhone.required' => 'رقم هاتف ولي الامر مطلوب',
            'parentPhone.numeric' => 'رقم هاتف ولي الامر خطأ',
            'status.required' => 'حالة الطالب مطلوبة',
            'status.in' => 'حالة الطالب خطأ',
            'row.required' => 'المرحللة الدراسية مطلوبة',


            
        ]);
    

    
        
        $student = Students::create([
            'name'  => $this->name,
            'phone' => $this->phone,
            'parentPhone' => $this->parentPhone,
            'status' => $this->status,
            'row' => $this->row,
        ]);
        $number = $student->id;
        $generator = new BarcodeGeneratorPNG();
        $barcode =  base64_encode($generator->getBarcode($number, $generator::TYPE_CODE_128));
        $student->barcode = $barcode;
        $student->update();
        


       
        foreach($this->selectedTeachers as $teacher){
            StudentSubject::create([
                'student' => $student->id,
                'teacher' => $teacher
            ]);
        }
        
        
        $this->name = '';
        $this->phone = '';
        $this->parentPhone = '';
        $this->status = '';
        $this->row = '';
        $this->selectedTeachers = [];
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم اضافة بيانات الطالب بنجاح');
        $this->emit('alert_remove');
    }

}
