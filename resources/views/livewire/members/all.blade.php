<div class="card" id="mebmers-all">
    
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
                    <input style="border-radius: 50px" wire:model="search" type="text" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="ابحث باسم المستخدم" autofocus>
                </div>
            </div>
            <table class="table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>رتبة المستخدم</th>
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
                                <td>{{ $row->email}}</td>
                                @if ( $row->role == 'Admin')
                                    <td>مدير النظام</td>
                                @else
                                    <td>مشرف النظام</td>
                                @endif
                                <td>
                                    <button class="btn edit" wire:click="edit({{ $row->id }})"><i class="fa fa-pen"></i></button>
                                    <button class="btn delete" wire:click="delete({{ $row->id }})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center delete">
                            <td colspan="5">
                                لا يوجد مستخدمين مضافين حتي الان
                            </td>
                        </tr>
                    @endif
                    
                </tbody>
                <tfoot>
                    <tr >
                        <td colspan="5" class="text-center">
                            {{ $rows->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
            
    </div>

</div>
