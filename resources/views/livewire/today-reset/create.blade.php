
<div id="today-reset-create">
    @if(session()->has('success'))
        <div class="pr-5 pl-5 message cairo">
            <div class="alert " style="background-color: #253C80;color:#fff">
                {{ session()->get('success') }}
            </div>
        </div>
        
    @endif
    @if(session()->has('danger'))
        <div class="pr-5 pl-5 message cairo">
            <div class="alert " style="background-color: #D03F3A;color:#fff">
                {{ session()->get('danger') }}
            </div>
        </div>
        
    @endif
    
        <div class="pr-5 pl-5 cairo mb-4">
            <div class="row">
                
                
                <div class="col-md-3 m-0">
                    
                    <select  data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المادة"
                        wire:model="subject" name="subject" class="form-control cairo js-example-disabled-results cairo" aria-label="Username" aria-describedby="basic-selectedTeachers">
                        <option value="" class="cairo input-group-text" selected >اختر المادة</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" class="cairo input-group-text">{{ $subject->name }}</option>
                        @endforeach
                       
                   </select>
                </div>
                <div class="col-md-3 m-0">
                    <select  data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المدرس"
                        wire:model="teacher" name="teacher" class="form-control cairo js-example-disabled-results cairo" aria-label="Username" aria-describedby="basic-selectedTeachers">
                        <option value="" class="cairo input-group-text" selected >اختر المدرس</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" class="cairo input-group-text">{{ $teacher->name }}</option>
                       @endforeach
                       
                   </select>
                </div>
                <div class="col-md-3 m-0">
                    <select  data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المرحلة"
                        wire:model="row" name="row" class="form-control cairo js-example-disabled-results cairo" aria-label="Username" aria-describedby="basic-selectedTeachers">
                        <option value="" class="cairo input-group-text" selected >اختر المرحلة</option>

                        @foreach ($rows as $row)
                            <option value="{{ $row->id }}" class="cairo input-group-text">{{ $row->name }}</option>
                       @endforeach
                       
                   </select>
                </div>
                <div class="col-md-3 m-0">
                    <div   class="input-group">
                        <input  style="border-radius: 50px" wire:change="changeDate($e.target.value)" wire:model="date" type="date" class="form-control text-center" aria-label="Username" aria-describedby="basic-name" placeholder="التاريخ" autofocus>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    @error('subject') 
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
                </div>
                <div class="col-md-3">
                    @error('teacher') 
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
                </div>
                
            </div>
        </div>
</div>

