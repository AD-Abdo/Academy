<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>اكاديمية ابن خلدون - @yield('title')</title>

        <link rel="shortcut icon" href="{{ URL::asset('assets/img/abnKhaldon.jfif') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.rtl.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome/css/all.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
        <style>
            p,h1,a,button,input,h2,h3,h4,h5,h6,label{
                font-family : 'Cairo' !important;
            }
            .right-side-views{
                display:none !important;
            }
            .login-wrapper .loginbox .login-right{
                padding: 0px 1rem;
            }
            .login-wrapper{
                padding:0px
            }
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
            }
            .login-body{
                position: relative;
                bottom: 0;
                background: rgba(0, 0, 0, 0.4);
                color: #f1f1f1;
                width: 100%;
                padding:0px
            }
            .loginbox{
                border-radius: 5px !important;
                padding-top:20px;
                padding-bottom:20px;
                display: block !important
                
            }
            label{
                color:#000 !important
            }
            button{
                background-color: #284070 !important
            }
        </style>
    </head>

    <body>
        <video autoplay muted loop id="myVideo">
            <source src="{{URL::asset('assets/img/blue.mp4')}}" type="video/mp4">
          </video>
          
        <div class="main-wrapper login-body">
            @yield('content')
        </div>


        <script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/feather.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
    </body>

</html>