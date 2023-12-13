<?php

namespace App\Http\Livewire\Teacherss;

use App\Models\Subjects;
use App\Models\Teachers;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $phone = '';
    public $subject = '';
    public $pid; 
    public function render()
    {
        $subjects = Subjects::latest()->get();
        return view('livewire.teacherss.create',[
            'pid' => $this->pid,
            'subjects' => $subjects
        ]);
    }

    protected $listeners = ['edit'];
    

    public function edit($id)
    {
        $row = Teachers::where('id',$id)->first();
        $this->name = $row->name;
        $this->phone = $row->phone;
        $this->subject = $row->subject;
        $this->pid = $row->id;
    }

    public function cancel()
    {
        $this->name = '';
        $this->phone = '';
        $this->subject = '';
        $this->pid = null;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
        ],[
            'name.required' => 'اسم المدرس مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'pay.required' => 'سعر الشهر مطلوب',
            'pay.numeric' => 'سعر الشهر خطأ',
            'perDay.required' => 'سعر الحصة مطلوب',
            'perDay.numeric' => 'سعر الحصة خطأ',
            'discount.required' => 'سعر الخصم مطلوب',
            'discount.numeric' => 'سعر الخصم خطأ',
            'free.required' => 'سعر الاعفاء مطلوب',
            'free.numeric' => 'سعر الاعفاء خطأ',
            'subject.required' => 'المادة الدراسية مطلوبة',
        ]);
    
        $row = Teachers::where('id',$this->pid)->first();
        if($row){
            $row->update([
                'name'  => $this->name,
                'phone' => $this->phone,
                'subject' => $this->subject
            ]);
        }
            
        
        $this->name = '';
        $this->phone = '';
        $this->subject = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم تعديل بيانات المدرس بنجاح');
        $this->emit('alert_remove');
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
        ],[
            'name.required' => 'اسم المدرس مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'pay.required' => 'سعر الشهر مطلوب',
            'pay.numeric' => 'سعر الشهر خطأ',
            'perDay.required' => 'سعر الحصة مطلوب',
            'perDay.numeric' => 'سعر الحصة خطأ',
            'discount.required' => 'سعر الخصم مطلوب',
            'discount.numeric' => 'سعر الخصم خطأ',
            'free.required' => 'سعر الاعفاء مطلوب',
            'free.numeric' => 'سعر الاعفاء خطأ',
            'subject.required' => 'المادة الدراسية مطلوبة',
        ]);
    

    
        
        Teachers::create([
            'name'  => $this->name,
            'phone' => $this->phone,
            'subject' => $this->subject
        ]);
        
        
        $this->name = '';
        $this->phone = '';
        $this->subject = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم اضافة بيانات المدرس بنجاح');
        $this->emit('alert_remove');
    }
}
