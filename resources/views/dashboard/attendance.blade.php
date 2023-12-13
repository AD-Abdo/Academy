@extends('dashboard.component.main')

@section('title', 'صفحة حضور الطلاب')
@section('attendance','active')

@section('content')

        
<div class="card" id="">
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @livewire('attendance.create')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @livewire('attendance.all')
            </div>
        </div>
    </div>
</div>



@endsection