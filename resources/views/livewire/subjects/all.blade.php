<div class="card" id="subjects-all">
    
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
                    <input style="border-radius: 50px" wire:model="search" type="text" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="ابحث باسم المادة" autofocus>
                </div>
            </div>
            <table class="table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>عدد المدرسين</th>
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
                                <td>{{ $row->Teachers->count()}}</td>
                                <td>
                                    <button class="btn edit" wire:click="edit({{ $row->id }})"><i class="fa fa-pen"></i></button>
                                    <button class="btn delete" wire:click="delete({{ $row->id }})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center delete">
                            <td colspan="4">
                                لا يوجد مواد دراسية مضافة حتي الان
                            </td>
                        </tr>
                    @endif
                    
                </tbody>
                <tfoot>
                    <tr >
                        <td colspan="4" class="text-center">
                            {{ $rows->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
            
    </div>

</div>
