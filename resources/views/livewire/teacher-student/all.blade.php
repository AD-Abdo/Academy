    
    <div class="teacher-student-all">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <div class="table-responsive">
            
            <table class="table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>#</th> 
                        <th>الاسم</th>
                        <th>حالة الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rows) > 0)
                        @php $i = 1; @endphp
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $row->name}}</td>
                                
                                @if($row->status == "pay")
                                    <td>دفع بالشهر</td>
                                @elseif($row->status == "free")
                                    <td>اعفاء</td>
                                @elseif($row->status == "discount")
                                    <td>خصم</td>
                                @elseif($row->status == "perDay")
                                    <td>دفع بالحصة</td>
                                @elseif($row->status == "close")
                                    <td>منقطع</td>
                                @endif
                                
                                
                               
                            </tr>
                        @endforeach
                    
                    @endif
                    
                </tbody>
                <tfoot>
                    <tr >
                        <td colspan="3" class="text-center">
                            {{ $rows->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
            
    </div>

