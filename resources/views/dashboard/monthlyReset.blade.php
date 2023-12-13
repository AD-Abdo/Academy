@extends('dashboard.component.main')

@section('title', 'صفحة كشف حضور الطالب شهريا')
@section('month-reset','active')

@section('content')

        
<div class="card" id="">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @livewire('month-reset.create')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @livewire('month-reset.all')
            </div>
        </div>
    </div>
</div>



@endsection