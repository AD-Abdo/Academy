@extends('dashboard.component.main')

@section('title', 'صفحة كل الطلاب')
@section('students','active')

@section('content')

        
<div class="row">
    <div class="col-sm-8">
        @livewire('students.all')
    </div>
    <div class="col-sm-4">
        @livewire('students.create')
    </div>
</div>



@endsection