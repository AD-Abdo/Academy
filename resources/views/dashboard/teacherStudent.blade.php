@extends('dashboard.component.main')

@section('title', 'صفحة طلاب المادة')
@section('teacherStudent','active')

@section('content')

        
<div class="card" id="">
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @livewire('teacher-student.create')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @livewire('teacher-student.all')
            </div>
        </div>
    </div>
</div>



@endsection