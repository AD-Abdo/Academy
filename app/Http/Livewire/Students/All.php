<?php

namespace App\Http\Livewire\Students;

use App\Models\Students;
use App\Models\Subjects;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search = '';
    protected $queryString = ['search'];
    public $subject;

 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['row'=>'$refresh'];

    
    public function render()
    {
        $rows = Students::latest()->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.students.all',[
            'rows' => $rows
        ]);
    }

    public function delete($id)
    {
        $row = Students::where('id',$id)->first();
        if($row){
            $row->forceDelete();
        }
        session()->flash('success','تم حذف بيانات الطالب بنجاح');
        $this->emit('alert_remove');
    }

    public function edit($id)
    {
        $this->emit('edit',$id);
    }
}
