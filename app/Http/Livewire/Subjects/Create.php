<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subjects;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $pid; 
    public function render()
    {
        return view('livewire.subjects.create',[
            'pid' => $this->pid
        ]);
    }

    protected $listeners = ['edit'];
 
    public function edit($id)
    {
        $row = Subjects::where('id',$id)->first();
        $this->name = $row->name;
        $this->pid = $row->id;
    }

    public function cancel()
    {
        $this->name = '';
        $this->pid = null;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required',
        ],[
            'name.required' => 'اسم المادة مطلوبة',
        ]);

        $row = Subjects::where('id',$this->pid)->first();
        if($row){
            $row->update([
                'name'  => $this->name
            ]);
        }
        
        $this->name = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم تعديل بيانات المادة بنجاح');
        $this->emit('alert_remove');
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
        ],[
            'name.required' => 'اسم المادة مطلوبة',
        ]);


        
        Subjects::create([
            'name'  => $this->name
        ]);
        
        
        $this->name = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم اضافة بيانات المادة بنجاح');
        $this->emit('alert_remove');
    }
}
