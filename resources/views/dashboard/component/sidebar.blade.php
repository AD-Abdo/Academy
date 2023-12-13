<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        {{-- <img src="{{ URL::asset('assets/img/abnKhaldon.jfif') }} " alt="Logo" width="100%" > --}}
        <ul>
            <li class="menu-title cairo" style="font-size: .8em;font-weight: bold"><span>الرئيسية</span></li>
            <li class=@yield('dashboard') >
                <a href="{{ URL::route('dashboard.index') }}" ><i data-feather="home"></i> <span style="font-size: .9em !important">لوحة التحكم</span></a>
            </li>
            @if(Auth::user()->role == 'Admin')
                <li class=@yield('rows') > 
                    <a href="{{ URL::route('dashboard.rows') }}"><i class="fa fa-align-right"></i> <span style="font-size: .9em !important">المراحل الدراسية</span></a>
                </li>
                <li class=@yield('subjects') > 
                    <a href="{{ URL::route('dashboard.subjects') }}"><i class="fa fa-book"></i> <span style="font-size: .9em !important">المواد الدراسية</span></a>
                </li>
            @endif
            <hr>
            
            <li class="menu-title cairo" style="font-size: .8em;font-weight: bold"><span>الطلاب</span></li>
            
            <li class=@yield('students') >
                <a href="{{ URL::route('dashboard.students') }}"><i class="fa fa-users"></i> <span style="font-size: .9em !important">الطلاب </span></a>
            </li>
            <li class=@yield('attendance') >
                <a href="{{ URL::route('dashboard.attendance') }}"><i class="fa fa-address-book"></i> <span style="font-size: .9em !important">حضور الطلاب</span></a>
            </li>
            @if(Auth::user()->role == 'Admin')
                <li class=@yield('today-reset') >
                    <a href="{{ URL::route('dashboard.todayReset') }}"><i class="fa fa-sticky-note"></i> <span style="font-size: .9em !important">كشف اليومية</span></a>
                </li>
            @endif

            <li class=@yield('month-reset') >
                <a href="{{ URL::route('dashboard.monthlyReset') }}"><i class="fa fa-address-card"></i> <span style="font-size: .9em !important">كشف حضور الطالب شهريا</span></a>
            </li>

            @if(Auth::user()->role == 'Admin')
            <hr>
                <li class="menu-title cairo" style="font-size: .8em;font-weight: bold"><span>المدرسين</span></li>
                <li class=@yield('teachers') >
                    <a href="{{ URL::route('dashboard.teachers') }}"><i class="fa fa-male"></i> <span style="font-size: .9em !important">المدرسين </span></a>
                </li>
                <li class=@yield('teacherStudent') >
                    <a href="{{ URL::route('dashboard.teacherStudent') }}"><i class="fa fa-users"></i> <span style="font-size: .9em !important">طلاب المدرس</span></a>
                </li>
                <li class=@yield('invoice') >
                    <a href="{{ URL::route('dashboard.invoice') }}"><i class="fa fa-inbox"></i> <span style="font-size: .9em !important">فاتورة المدرس</span></a>
                </li>

                <hr>
                <li class="menu-title cairo" style="font-size: .8em;font-weight: bold"><span>اعضاء النظام</span></li>
                <li class=@yield('members') >
                    <a href="{{ URL::route('dashboard.members') }}"><i class="fa fa-user-circle"></i> <span style="font-size: .9em !important">الاعضاء </span></a>
                </li>
            @endif
            


            
            </li>
        </ul>
    </div>
</div>
