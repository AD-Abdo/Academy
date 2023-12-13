<?php

namespace App\Http\Livewire\Rows;

use App\Models\Rows;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $pid; 
    public function render()
    {
        return view('livewire.rows.create',[
            'pid' => $this->pid
        ]);
    }

    protected $listeners = ['edit'];
 
    public function edit($id)
    {
        $row = Rows::where('id',$id)->first();
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
            'name.required' => 'اسم المرحلة مطلوب',
        ]);

        $row = Rows::where('id',$this->pid)->first();
        if($row){
            $row->update([
                'name'  => $this->name
            ]);
        }
        
        $this->name = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم تعديل بيانات المرحلة بنجاح');
        $this->emit('alert_remove');
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
        ],[
            'name.required' => 'اسم المرحلة مطلوب',
        ]);


        
        Rows::create([
            'name'  => $this->name
        ]);
        
        
        $this->name = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم اضافة بيانات المرحلة بنجاح');
        $this->emit('alert_remove');
    }
    
}
