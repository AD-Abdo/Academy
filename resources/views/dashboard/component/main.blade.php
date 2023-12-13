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
        <link rel="stylesheet" href="{{ URL::asset('assets/css/Toast.css') }}">
        <link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet" />
        

        @livewireStyles

        <style>
            p,h1,a,button,input,h2,h3,h4,h5,h6,.cairo,table,.select2,option,.select2, .select2-container,span,textarea{
                font-family : 'Cairo' !important;
            }
            .select2-selection{
                padding-right: 1em !important;
                padding-left: 1em !important;
                padding-bottom: 1em !important
            }
            .right-side-views{
                display:none !important;
            }
            .header .header-one{
                border: 0px !important;
            }
            .sidebar {
                top:auto !important;
                border-top-left-radius: 0px !important;
            }
            .header{
                border-radius: 0px;
            }
            .sidebar .sidebar-menu > ul > li > a{
                color: #253C80 !important;
            }
            .sidebar .sidebar-menu > ul > li.active a,.sidebar .sidebar-menu > ul > li.hover a,
            .sidebar .sidebar-menu > ul > li > a:hover,.sidebar .sidebar-menu > ul > li > a:hover span,
            .sidebar .sidebar-menu > ul > li > a:hover svg{
                background-color: #253C80;
                color: #fff !important
            }
            .page-title{
                font-weight:bold !important;
                font-size:1.5em 
            }
            .sidebar .sidebar-menu > ul > li.active a::before{
                background: #D03F3A 
            }
            .cairo{
                font-family : 'Cairo' !important;
            }
            .cairo-button{
                background-color: #253C80;
                color: #fff;
                font-family : 'Cairo' !important;
                width: 100%;
                font-weight: bold
            }
            .cairo-button:hover{
                background: #D03F3A ;
                color: #fff
            }
            .user-menu .dropdown-menu .dropdown-item:hover,.user-menu .dropdown-menu .dropdown-item:hover {
                background-color: #253C80;
                color: #fff;
            }
            .edit{
                background-color: #253C80;
                color: #fff;
            }
            .download{
                background-color: #13AECB;
                color: #fff;
                border-radius: 4px;
                
            }
            .download i {
                color: #fff
            }
            .download:hover i {
                color: #333
            }
            .delete{
                background-color: #D03F3A;
                color: #fff;
            }
            
            .page-item:not(:first-child) .page-link:hover{
                border: 1px solid #253C80;
                color: #253C80;
            }
            @media print {
                .print {
                    display: none !important;
                }
                .noPrint{
                    display: none;
                }
            }
        </style>
        @yield('css')
        

    </head>
    <body>


        <div class="main-wrapper">
            @include('dashboard.component.header')
            @include('dashboard.component.sidebar')
  
        </div>
        <div class="page-wrapper" style="min-height: 760px;">
            <div class="content container-fluid">
                
                @yield('content')
            </div>
            
        </div>

       




        <script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/feather.min.js') }}"></script>

        <script src="{{ URL::asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
        <script src="{{ URL::asset('assets/js/Toast.js') }}"></script>
        <script src="{{ URL::asset('assets/js/select2.min.js')}}"></script>
        <x:pharaonic-select2::scripts />
 
        <!-- Way 2 : Vendor Publishing REQURIED -->
        <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>

        <script>
            function show(){
                if($("#menu").hasClass("show")){
                    $("#menu").removeClass("show")
                }else{
                    $("#menu").addClass("show")
                }
            }
            

        </script>
        @yield('js')
        <livewire:scripts>
        <script>
            
            

            $(document).ready(function(){
                window.livewire.on('alert_remove',()=>{
                setTimeout(function(){ $(".message").fadeOut('fast');
                }, 4000);
                
                
                
            });
            
        });
        
        </script>
        
    </body>

</html>