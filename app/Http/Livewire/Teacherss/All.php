<?php

namespace App\Http\Livewire\Teacherss;

use App\Models\Teachers;
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
        $rows = Teachers::latest()->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.teacherss.all',[
            'rows' => $rows
        ]);
    }

    public function delete($id)
    {
        $row = Teachers::where('id',$id)->first();
        if($row){
            $row->delete();
        }
        session()->flash('success','تم حذف بيانات المدرس بنجاح');
        $this->emit('alert_remove');
    }

    public function edit($id)
    {
        $this->emit('edit',$id);
    }
}
