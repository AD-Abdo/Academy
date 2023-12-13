@extends('dashboard.component.main')

@section('title', 'صفحة المواد الدراسية')
@section('subjects','active')

@section('content')

        
    <div class="row">
        <div class="col-sm-8">
            @livewire('subjects.all')
        </div>
        <div class="col-sm-4">
            @livewire('subjects.create')
        </div>
    </div>


@endsection