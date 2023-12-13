<div class="card" id="profile-edit">
    <div class="card-header">
        <h5 class="card-title">تعديل البيانات الشخصية</h5>
    </div>
    
    <div class="card-body">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-email">البريد الالكتروني</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-email" value="{{ $userEmail }}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-name">اسم المستخدم</span>
                    <input wire:model="name" type="text" class="form-control" aria-label="Username" aria-describedby="basic-name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-password">كلمة المرور</span>
                    <input wire:model="password" type="password" class="form-control" aria-label="Username" aria-describedby="basic-password">
                </div>
            </div>
            
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                @error('name')
                    <div class="form-group text-center bg-danger p-2 error">
                        <p style="font-size: .8em;color:#fff">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>
            <div class="col-lg-6">
                @error('password') 
                    <div class="form-group text-center bg-danger p-2 error">
                        <p style="font-size: .8em;color:#fff">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>
                
        </div>
           
        <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button class="btn cairo-button" wire:click="editProfile">تعديل</button>
            </div>
            <div class="col-md-4"></div>
            
        </div>

            
    </div>
</div>



