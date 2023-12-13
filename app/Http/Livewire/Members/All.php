<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search = '';
    protected $queryString = ['search'];

 
    public function updatingSearch()
    {
        $this->resetPage();
    }


    protected $listeners = ['row'=>'$refresh'];

    public function render()
    {
        $rows = User::latest()->where('name', 'like', '%'.$this->search.'%')->where('id','!=',Auth::user()->id)->paginate(10);
        return view('livewire.members.all',[
            'rows' => $rows
        ]);
    }

    public function delete($id)
    {
        $row = User::where('id',$id)->first();
        if($row){
            $row->delete();
        }
        session()->flash('success','تم حذف بيانات المستخدم بنجاح');
        $this->emit('alert_remove');
    }

    public function edit($id)
    {
        $this->emit('edit',$id);
    }
}
