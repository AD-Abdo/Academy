
<div  id="teacher-pay-all">
    <div class="row noPrint">
        <div class="col-md-3 m-0">
            <div   class="input-group">
                <input  style="border-radius: 50px" wire:model="pay" type="number" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="دفع بالشهر">
            </div>
        </div>
        <div class="col-md-3 m-0">
            <div   class="input-group">
                <input  style="border-radius: 50px" wire:model="perDay" type="number" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="دفع بالحصة">
            </div>
        </div>
        <div class="col-md-3 m-0">
            <div   class="input-group">
                <input  style="border-radius: 50px" wire:model="discount" type="number" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="خصم">
            </div>
        </div>
        
        <div class="col-md-3 m-0">
            <div   class="input-group">
                <input  style="border-radius: 50px" wire:model="free" type="number" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="اعفاء">
            </div>
        </div>
        
    </div>
    <div class="table-responsive">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <div class="pt-2 pb-2 print cairo" style="text-align: left">
                <button class="p-2" onclick="window.print();return false;" style="background-color: #253C80;color:#fff"><i class="fa fa-print"></i> </button>
        </div>
        <table class="table table-nowrap mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>تاريخ الحضور</th>
                    <th colspan="2" >دفع بالشهر</th>
                    <th colspan="2" >خصم</th>
                    <th colspan="2" >دفع بالحصة</th>
                    <th colspan="2" >اعفاء</th>
                    <th>المجموع</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($rows) > 0)
                    @php
                     $i = 1;
                     $total = 0;
                    @endphp
                    @foreach ($rows as $row)
                        @php
                            $pay = 0;
                            $free = 0;
                            $discount = 0;
                            $perDay = 0;
                        @endphp
                        @foreach ($row->Teacher->StudentAttendance->where('day',$row->day)->where('month',$month)->where('year',$year)  as $student)
                            @if($student->Student->status == "pay")
                              @php  
                                $pay = 0; 
                                $pay =  $pay  +1 ; 
                              
                              @endphp
                            @elseif($student->Student->status == "free")
                                @php  
                                    $free = 0; 
                                    $free =  $free  +1 ; 
                                
                                @endphp
                            @elseif($student->Student->status == "discount")
                                @php  
                                    $discount = 0; 
                                    $discount =  $discount  +1 ; 
                                
                                @endphp
                            @elseif($student->Student->status == "perDay")
                                @php  
                                    $perDay = 0; 
                                    $perDay =  $perDay  +1 ; 
                                
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                           
                            <td>{{ $i++}}</td>
                            <td>{{ $row->year }}-{{ $row->month }}-{{ $row->day }}</td>
                            <td>{{ $pay }} </td>
                            <td> {{ $mpay }}</td>
                            <td>{{ $discount }}  </td>
                            <td>{{ $mdiscount }} </td>
                            <td>{{ $perDay }}  </td>
                            <td> {{ $mperDay }} </td>
                            <td>{{ $free }}  </td>
                            <td>{{ $mfree }} </td>
                        
                            <td>{{ ($pay * $mpay) +  ($discount * $mdiscount) + ($perDay * $mperDay)  + ($free * $mfree)}} جنية</td>

                            @php
                                $total =  $total + ($pay * $mpay) +  ($discount * $mdiscount) + ($perDay * $mperDay)  + ($free * $mfree);
                            @endphp

                            

                            

                            
                            
                        </tr>
                    @endforeach
                    <tr style="background-color:  #253C80">
                    
                        <td></td>
                        <td class="cairo">
                            
                            <div class="text-light"  >
                                الاجمالي
                            </div>
                                
                        </td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  class="cairo">
                            
                            <div class="text-light">
                                {{ $total }} جنية
                            </div>
                        </td>
                    </tr>
                
                @endif

                
                
            </tbody>
            
            
           
        </table>
    </div>
        
</div>

