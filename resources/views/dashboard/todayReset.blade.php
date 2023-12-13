@extends('dashboard.component.main')

@section('title', 'صفحة كشف اليومية')
@section('today-reset','active')

@section('content')

        
<div class="card" id="">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @livewire('today-reset.create')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @livewire('today-reset.all')
            </div>
        </div>
    </div>
</div>



@endsection