<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['editProfile'=>'$refresh'];
    public function render()
    {
        $userRole = Auth::user()->role; 
        $userCreatedOn = Auth::user()->created_at; 
        $userName = Auth::user()->name; 
        return view('livewire.profile.show',[
            'userRole' => $userRole,
            'userCreatedOn' => $userCreatedOn,
            'userName' => $userName,
        ]);
    }
}
