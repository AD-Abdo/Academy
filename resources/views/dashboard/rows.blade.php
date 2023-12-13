@extends('dashboard.component.main')

@section('title', 'صفحة المراحل الدراسية')
@section('rows','active')

@section('content')

        
    <div class="row">
        <div class="col-sm-8">
            @livewire('rows.all')
        </div>
        <div class="col-sm-4">
            @livewire('rows.create')
        </div>
    </div>


@endsection