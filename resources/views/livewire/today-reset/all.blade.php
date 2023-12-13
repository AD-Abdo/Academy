
<div  id="today-reset-all">
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
                    <th>المبلغ</th>
                </tr>
            </thead>
            <tbody>
                @if (count($rows) > 0)
                    @php $i = 1; @endphp
                    @foreach ($rows as $row)
                        <tr>
                           
                            <td>{{ $i++}}</td>
                                       
                            <td>{{  $row->Salary->Student->name }}</td>

                            
                            @if($row->Salary->Student->status == "pay")
                                <td>دفع بالشهر</td>
                                @php
                                    $pay =  $pay + 1;
                                @endphp
                            @elseif($row->Salary->Student->status == "free")
                                <td>اعفاء</td>
                                @php
                                    $free =  $free + 1;
                                @endphp
                            @elseif($row->Salary->Student->status == "discount")
                                <td>خصم</td>
                                @php
                                    $discount =  $discount + 1;
                                @endphp
                            @elseif($row->Salary->Student->status == "perDay")
                                <td>دفع بالحصة</td>
                                @php
                                    $perDay =  $perDay + 1;
                                @endphp
                            @elseif($row->Salary->Student->status == "close")
                                <td>منقطع</td>
                            @endif

                            <td>{{  $row->price }}</td>

                            @php
                                $total =  $total + $row->price;
                            @endphp
                            
                        </tr>
                    @endforeach
                @else
                    @php
                        $total =  0;
                    @endphp
                @endif

                @if ($total > 0)
                <tr class="text-light delete">
                    <td> دفع بالشهر ( {{ $pay }} )</td>
                    <td> دفع بالحصة ( {{ $perDay }} )</td>
                    <td> خصم ( {{ $discount }} )</td>
                    <td> اعفاء ( {{ $free }} )</td>
                    
                   
                </tr>
                <tr style="background-color:  #253C80">
                    
                    
                    <td class="cairo">
                        
                        <div class="text-light"  >
                            الاجمالي
                        </div>
                            
                    </td>
                    <td></td>
                    <td></td>
                    <td  class="cairo">
                        
                        <div class="text-light">
                            {{ $total }}
                        </div>
                    </td>
                </tr>
                
            @endif
                
            </tbody>
            
            
           
        </table>
    </div>
        
</div>

