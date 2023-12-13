<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Change extends Component
{
    protected $listeners = ['editProfile'=>'$refresh'];
    public function render()
    {
        $userName = Auth::user()->name; 
        return view('livewire.profile.change',[
            'userName' => $userName,
        ]);
    }
}
