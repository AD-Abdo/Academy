<div class="card" id="rows-create">
    
    <div class="card-body">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-name">اسم المرحلة</span>
                    <input wire:model="pid" type="hidden" class="form-control" aria-label="Username" aria-describedby="basic-name">
                    <input wire:model="name" type="text" class="form-control" aria-label="Username" aria-describedby="basic-name">
                </div>
            </div>
            
            
        </div>
        @error('name') 
            <div class="form-group row">
                <div class="col-lg-12">
                        <div class="form-group text-center bg-danger p-2 error">
                            <p style="font-size: .8em;color:#fff">
                                {{ $message }}
                            </p>
                        </div>
                </div>
                
            </div>
        @enderror
        <div class="form-group row">
            
            @if($pid != null)
                <div class="col-md-6">
                    <button class="btn edit w-100" wire:click="update">تعديل</button>
                </div>
                <div class="col-md-6">
                    <button class="btn delete w-100" wire:click="cancel">الغاء</button>
                </div>

            @else
                <div class="col-md-12">
                    <button class="btn edit w-100" wire:click="create">اضافة</button>
                </div>
            @endif
            
            
        </div>
           
        

            
    </div>
</div>

