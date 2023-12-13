<div class="header header-one">

    <div class="header-left header-left-one">
        {{-- <a href="index.html" class="logo">
            <img src="assets/img/abnKhaldon.jfif" alt="Logo">
        </a>
        <a href="index.html" class="white-logo">
            <img src="assets/img/abnKhaldon.jfif" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ URL::asset('assets/img/abnKhaldon.jfif') }} " alt="Logo" width="30" height="30">
        </a> --}}
    </div>


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">

   

        

    <li class="nav-item dropdown has-arrow main-drop">           
            @livewire('profile.change')
            <div class="dropdown-menu"  id="menu">
                <a class="dropdown-item" href="{{ URL::route('dashboard.profile') }}"><i data-feather="user" class="me-1"></i> حسابي</a>
                
                <a href="{{ route('dashboard.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item" >
                    <i data-feather="log-out" class="me-1"></i> تسجيل الخروج
                </a>    
                <form id="frm-logout" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>

    </ul>

</div>