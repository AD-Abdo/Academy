@extends('dashboard.component.main')

@section('title', 'الصفحة الشخصية')

@section('content')

        
    

    <div class="row cairo">
        <div class="col-sm-12">
            @livewire('profile.show')
        </div>
        <div class="col-sm-12">
            @livewire('profile.edit')
        </div>
    </div>


@endsection