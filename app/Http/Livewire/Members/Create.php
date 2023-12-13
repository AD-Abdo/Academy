<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = '';
    public $pid; 
    public function render()
    {
        return view('livewire.members.create',[
            'pid' => $this->pid
        ]);
    }

    protected $listeners = ['edit'];
    

    public function edit($id)
    {
        $row = User::where('id',$id)->first();
        $this->name = $row->name;
        $this->email = $row->email;
        $this->role = $row->role;
        $this->pid = $row->id;
    }

    public function cancel()
    {
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->password = '';
        $this->pid = null;
    }

    public function update()
    {
        if($this->password != null || !empty($this->password)){
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|max:16',
                'role' => 'required'
            ],[
                'name.required' => 'اسم المستخدم مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.email' => 'البريد الالكتروني غير صحيح',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.min' => 'كلمة المرور يجب ان تحتوي على اكثر من 8 احرف او ارقام',
                'password.max' => 'كلمة المرور يجب ان تحتوي على اقل من 16 احرف او ارقام',
                'role.required' => 'رتبة المتسخدم مطلوبة',
            ]);
    
            $row = User::where('id',$this->pid)->first();
            if($row){
                $row->update([
                    'name'  => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'role' => $this->role
                ]);
            }
            
        }else{
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required'
            ],[
                'name.required' => 'اسم المستخدم مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'email.email' => 'البريد الالكتروني غير صحيح',
                'role.required' => 'رتبة المتسخدم مطلوبة',
            ]);
    
            $row = User::where('id',$this->pid)->first();
            if($row){
                $row->update([
                    'name'  => $this->name,
                    'email' => $this->email,
                    'role' => $this->role
                ]);
            }
            
        }
        

        $row = User::where('id',$this->pid)->first();
        if($row){
            $row->update([
                'name'  => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role
            ]);
        }
        
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم تعديل بيانات المتسخدم بنجاح');
        $this->emit('alert_remove');
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
            'role' => 'required'
        ],[
            'name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تحتوي على اكثر من 8 احرف او ارقام',
            'password.max' => 'كلمة المرور يجب ان تحتوي على اقل من 16 احرف او ارقام',
            'role.required' => 'رتبة المتسخدم مطلوبة',
        ]);

    
        
        User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role'=> $this->role
        ]);
        
        
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->pid = null;
        $this->emit('row');
        session()->flash('success','تم اضافة بيانات المتسخدم بنجاح');
        $this->emit('alert_remove');
    }
}
