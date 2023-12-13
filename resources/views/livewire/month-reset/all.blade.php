
<div  id="month-reset-all">
    <div class="table-responsive">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <table class="table table-nowrap mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الطالب</th>
                    <th>الدفع</th>
                    <th>تاريخ ووقت الحضور</th>
                </tr>
            </thead>
            <tbody>
                @if (count($rows) > 0)
                    @php $i = 1; @endphp
                    @foreach ($rows as $row)
                        <tr>
                           
                            <td>{{ $i++}}</td>
                                       
                            <td>{{  $row->Student->name }}</td>

                            
                            @if($row->Student->status == "pay")
                                <td>دفع بالشهر</td>
                                
                            @elseif($row->Student->status == "free")
                                <td>اعفاء</td>
                               
                            @elseif($row->Student->status == "discount")
                                <td>خصم</td>
                                
                            @elseif($row->Student->status == "perDay")
                                <td>دفع بالحصة</td>
                                
                            @elseif($row->Student->status == "close")
                                <td>منقطع</td>
                            @endif

                            
                            <td>{{ date('l, d M Y - h:i A', strtotime($row->created_at)) }}</td>

                            

                            

                            
                            
                        </tr>
                    @endforeach
                
                @endif

                
                
            </tbody>
            
            
           
        </table>
    </div>
        
</div>

