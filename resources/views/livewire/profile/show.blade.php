<div id="profile-show">
    <div class="profile-cover">
        <div class="profile-cover-wrap">
            <img class="profile-cover-img" alt="Profile Cover" id="cover-image" src="{{ URL::asset('../assets/img/cover.jpg') }}" style="object-fit:cover">
            
        </div>
    </div>
    <div class="text-center mb-5 mt-4">
        <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
            <img class="avatar-img" src="{{ URL::asset('../assets/img/abnKhaldon.jfif') }}" alt="Profile Image" id="blah" style="border:5px solid #fff">
       
        </label>
        <h2 class="cairo mb-3" >{{ $userName }}</h2>
        <ul class="list-inline cairo">
            <li class="list-inline-item">
                <i class="far fa-user "></i> <span style="font-weight: bold" > الرتبة : </span><span>@if($userRole == "Admin") مدير النظام@else  مشرف النظامس@endif</span>
            </li>
        
            <li class="list-inline-item">
                <i class="far fa-calendar-alt"></i><span style="font-weight: bold"> تاريخ  الانضمام : </span> <span>{{ date('l, d M Y - h:i A', strtotime($userCreatedOn)) }}</span>
            </li>
        </ul>
    </div>
    
</div>