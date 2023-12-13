@extends('dashboard.component.main')

@section('title', 'الصفحة الرئيسية')
@section('dashboard','active')

@section('content')


    <div class="row">
        <div class="col-sm-12">
            @livewire('dashboard.home')
        </div>
    </div>


@endsection