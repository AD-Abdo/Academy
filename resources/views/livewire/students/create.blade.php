<div class="card" id="students-create">
    
    <div class="card-body">
        @if(session()->has('success'))
            <div class="pr-5 pl-5 message cairo">
                <div class="alert " style="background-color: #253C80;color:#fff">
                    {{ session()->get('success') }}
                </div>
            </div>
            
        @endif
        <div class="form-group row">.
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <img src="{{ URL::asset('../assets/img/student.png') }}" alt="" style="border-radius: 100px">
                </div>
                <div class="col-md-3"></div>
            </div>
            
        
        </div>
       
        <div class="form-group row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-name">اسم الطالب</span>
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
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-phone">رقم الهاتف</span>
                    <input wire:model="phone" type="text" class="form-control" aria-label="Username" aria-describedby="basic-phone">
                </div>
            </div>
            
            
        </div>
        @error('phone') 
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
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-parentPhone">رقم هاتف ولي الامر</span>
                    <input wire:model="parentPhone" type="text" class="form-control" aria-label="Username" aria-describedby="basic-parentPhone">
                </div>
            </div>
            
            
        </div>
        @error('parentPhone') 
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
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-status">حالة الطالب</span>
                    <select wire:model="status" name="status" class="form-control cairo" aria-label="Username" aria-describedby="basic-status">
                        <option selected disabled class="cairo input-group-text" value="">اختار حالة الطالب</option>
                        <option value="pay" class="cairo input-group-text">دفع بالشهر</option>
                        <option value="perDay" class="cairo input-group-text">دفع بالحصة</option>
                        <option value="discount" class="cairo input-group-text">خصم</option>
                        <option value="free" class="cairo input-group-text">اعفاء</option>
                        <option value="close" class="cairo input-group-text">منقطع</option>
                    </select>
                </div>
            </div>
            
            
        </div>
        @error('status') 
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
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-text cairo" id="basic-row">المرحلة</span>
                    <select wire:model="row" name="row" class="form-control cairo" aria-label="Username" aria-describedby="basic-row">
                        <option selected disabled class="cairo input-group-text" value="">اختر المرحلة</option>
                        @foreach ($rows as $row)
                            <option value="{{ $row->id }}" class="cairo input-group-text">{{ $row->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            
            
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <p class="mb-1 pb-0">اختر المادة</p>
                <select multiple data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المادة"
                     wire:model="selectedTeachers" name="selectedTeachers" class="form-control cairo js-example-disabled-results cairo" aria-label="Username" aria-describedby="basic-selectedTeachers">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" class="cairo input-group-text">{{  $teacher->Subject->name }} - {{ $teacher->name }}</option>
                    @endforeach
                    
                </select>
                
            </div>
        </div>
        

       
        @error('row') 
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
            <div class="col-md-4">
                   
                
                    <a href="data:image/png;base64,{{ $barcode }}"
                        download="باكود الطالب {{ $name }}.png"
                        class="btn download w-100"
                        data-original-title="تحميل باركود الطالب">
                        الباركود
                    </a>
                </div>
                <div class="col-md-4">
                    
                    <button class="btn edit w-100" wire:click="update">تعديل</button>
                </div>
                <div class="col-md-4">
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



