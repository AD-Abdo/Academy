@extends('dashboard.component.main')

@section('title', 'صفحة كل المدرسين')
@section('teachers','active')

@section('content')

        
    <div class="row">
        <div class="col-sm-8">
            @livewire('teacherss.all')
        </div>
        <div class="col-sm-4">
            @livewire('teacherss.create')
        </div>
    </div>

@endsection