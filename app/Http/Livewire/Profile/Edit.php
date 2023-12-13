<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    

    public $name ;
    public $password;
 
    public function render()
    {
        $userEmail = Auth::user()->email; 
        return view('livewire.profile.edit',[
            'userEmail' => $userEmail,
        ]);
    }

   

    public function editProfile()
    {
        $this->validate([
            'name' => 'required',
            'password' => 'nullable|min:8|max:16'
        ],[
            'name.required' => 'اسم المستخدم مطلوب',
            'password.min' => 'كلمة المرور يجب ان تحتوي على اكثر من 8 احرف او ارقام',
            'password.max' => 'كلمة المرور يجب ان تحتوي على اقل من 16 احرف او ارقام'
        ]);

        if($this->password == null){
            Auth::user()->update([
                'name' => $this->name,
            ]);
        }else{
            Auth::user()->update([
                'name' => $this->name,
                'password' => Hash::make($this->password)
            ]);
        }
        

        $this->name = '';
        $this->password = '';
        $this->emit('editProfile');
        session()->flash('success','تم تعديل بيانات الحساب بنجاح');
        $this->emit('alert_remove');
    }

}
