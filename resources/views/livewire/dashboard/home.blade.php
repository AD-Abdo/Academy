<div id="dashboard-home">
    @if(Auth::user()->role == 'Admin')
        <div class="row">
            <div class="col-xl-3 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon " style="background-color: #253c803e;color:#253C80">
                                <i class="fa fa-users"></i> 
                            </span>
                        <div class="dash-count cairo">
                            <div class="dash-title" style="font-size: .65em">عدد الطلاب المضافين اليوم</div>
                                <div class="dash-counts">
                                    <p>
                                        {{ $todayStudens }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon " style="background-color: #253c803e;color:#253C80">
                                <i class="fa fa-users"></i> 
                            </span>
                        <div class="dash-count cairo">
                            <div class="dash-title"  style="font-size: .65em">عدد الطلاب الكلي</div>
                                <div class="dash-counts">
                                    <p>
                                        {{ $studens }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon " style="background-color: #253c803e;color:#253C80">
                                <i class="fas fa-male"></i>
                            </span>
                        <div class="dash-count cairo">
                            <div class="dash-title" style="font-size: .65em">عدد المدرسين المضافين اليوم</div>
                                <div class="dash-counts">
                                    <p>
                                        {{ $todayTeachers }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon " style="background-color: #253c803e;color:#253C80">
                                <i class="fas fa-male"></i>
                            </span>
                        <div class="dash-count cairo">
                            <div class="dash-title" style="font-size: .65em">عدد المدرسين الكلي</div>
                                <div class="dash-counts">
                                    <p>
                                        {{ $teachers }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @foreach ($TeacherSubjects as $teacher)
            <div class="col-xl-3 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon " style="background-color: #D03F3A3e;color:#D03F3A">
                                <i class="fas fa-book"></i>
                            </span>
                        <div class="dash-count cairo">
                            <div class="dash-title" style="font-size: .65em">{{ $teacher->Subject->name }} - {{ $teacher->name }} </div>
                                <div class="dash-counts">
                                    <p>
                                        {{ count($teacher->StudentsCount) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
