@extends('setup.component.main')

@section('title', 'تنصيب النظام')

@section('content')

        
<div class="login-wrapper">
    <div class="container">

            <div class="loginbox pt-0">
                <img class="img-fluid " style="height: 400px;border-top-right-radius:5px;border-top-left-radius:5px" width="100%" src="{{ URL::asset('assets/img/abnKhaldon.jfif') }}" alt="Logo">

                <div class="login-right mt-0 pt-0">

                    <div class="login-right-wrap mt-0 pt-0">
                        <form action="{{ URL::route('setup.save') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label class="form-control-label">اسم المستخدم</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            @if($errors->has('name'))
                                <div class="form-group text-center bg-danger p-2">
                                    <p style="font-size: .8em">
                                        {{ $errors->first('name') }}
                                    </p>
                                </div>
                            @endif
                            
                            
                            <div class="form-group">
                                <label class="form-control-label">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            @if($errors->has('email'))
                                <div class="form-group text-center bg-danger p-2">
                                    <p style="font-size: .8em">
                                        {{ $errors->first('email') }}
                                    </p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="form-control-label">كلمة المرور</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="form-control pass-input">
                                    <span class="fas fa-eye toggle-password"></span>
                            </div>
                            @if($errors->has('password'))
                                <div class="form-group text-center bg-danger p-2 mt-4">
                                    <p style="font-size: .8em">
                                        {{ $errors->first('password') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                                
                            <button class="btn btn-lg btn-block btn-primary w-100" style="font-size: 1em;" type="submit">تنصيب</button>
                                

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection