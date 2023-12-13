@extends('dashboard.component.main')

@section('title', 'صفحة اعضاء النظام')
@section('members','active')

@section('content')

        
    <div class="row">
        <div class="col-sm-8">
            @livewire('members.all')
        </div>
        <div class="col-sm-4">
            @livewire('members.create')
        </div>
    </div>


@endsection