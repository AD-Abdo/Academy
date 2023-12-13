@extends('dashboard.component.main')

@section('title', 'صفخة قاتورة المدرس')
@section('invoice','active')

@section('content')

        
<div class="card" id="">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @livewire('teacher-pay.create')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @livewire('teacher-pay.all')
            </div>
        </div>
    </div>
</div>


@endsection