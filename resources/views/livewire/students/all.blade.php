<div class="card" id="students-all">
    
    <div class="card-body">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <div class="table-responsive">
            <div class="pr-5 pl-5 cairo mb-4">
                <div class="input-group">
                    <input style="border-radius: 50px" wire:model="search" type="text" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="ابحث باسم الطالب" autofocus>
                </div>
            </div>
            <table class="table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>#</th> 
                        <th>الاسم</th>
                        <th>الرقم علي النظام</th>
                        <th>رقم الهاتف</th>
                        <th>رقم هاتف ولي الامر</th>
                        <th>حالة الطالب</th>
                        <th>المرحلة</th>
                        <th>عدد المواد</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rows) > 0)
                        @php $i = 1; @endphp
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $row->name}}</td>
                                <td>{{ $row->id}}</td>
                                <td>{{ $row->phone}}</td>
                                <td>{{ $row->parentPhone}}</td>
                                
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
                                <td>{{ $row->Row->name}}</td>
                                
                                <td>{{ count($row->Subjects) }}</td>
                                
                                <td>
                                    
                                    <button class="btn edit" wire:click="edit({{ $row->id }})"><i class="fa fa-pen"></i></button>
                                    @if(Auth::user()->role == 'Admin')
                                        <button class="btn delete" wire:click="delete({{ $row->id }})"><i class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    
                    @endif
                    
                </tbody>
                <tfoot>
                    <tr >
                        <td colspan="6" class="text-center">
                            {{ $rows->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
            
    </div>

</div>
