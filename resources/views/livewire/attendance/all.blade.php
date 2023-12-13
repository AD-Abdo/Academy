
    <div  id="attendance-all">
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
                        <th>عدد الحصص</th>
                        <th>الدفع</th>
                        <th>المادة</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rows) > 0)
                        @php $i = 1; @endphp
                        @foreach ($rows as $row)
                            <tr>
                                @if($row->Student->status == "perDay")
                                    @if(count($row->Student->Salary->where('student',$row->Student->id)->where('month',$month)->where('year',$year)->where('day',$day)) > 0)
                                        <td>{{ $i++}}</td>
                                    @else
                                        <td class="bg-danger text-light">{{ $i++}}</td>
                                    @endif
                                @else
                                    @if( $row->Student->checkMonthlySalary  == null )

                                        <td class="bg-danger text-light">{{ $i++}}</td>
                                    @else
                                    
                                    
                                        @if(count($row->Student->checkMonthlySalary->Salary) != count($row->Student->Subjects))
                                            @if($row->Student->checkMonthlySalary->checkMonthlySubjects && $row->Student->checkMonthlySalary->checkMonthlySubjects->teacher != $teacher  )
                                                    <td class="bg-danger text-light">{{ $i++}}</td>
                                            @else
                                                <td>{{ $i++}}</td>
                                            @endif

                                        @else
                                            <td>{{ $i++}}</td>
                                        @endif
                                        

                                    @endif
                                @endif
                                
                                <td>{{  $row->Student->name }}</td>
                                <td>{{  count($row->Student->checkMonthlyAttendance->where('teacher',$teacher)) }}</td>
                                @if($row->Student->status == "pay")
                                    <td>دفع بالشهر</td>
                                @elseif($row->Student->status == "free")
                                    <td>اعفاء</td>
                                @elseif($row->Student->status == "discount")
                                    <td>خصم</td>
                                @elseif($row->Student->status == "perDay")
                                    <td>دفع بالحصة</td>
                                @elseif($row->Student->status == "close")
                                    <td>منقطع</td>
                                @endif
                                <td>{{  $row->Subject->name }} - {{  $row->Teacher->name }}</td>
                                
                                
                                
                                <td>
                                    @if($row->Student->status == "perDay")
                                        @if(count($row->Student->Salary->where('student',$row->Student->id)->where('month',$month)->where('year',$year)->where('day',$day)) > 0)
                                        @else
                                            <div class="form-group">
                                                <div class="input-group">
                                                    
                                                    <input style="border: 1px solid #253C80" wire:model="price" value="0" type="number" min="0" class="form-control"  placeholder="ادخل المبلغ">
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        @if( $row->Student->checkMonthlySalary  == null )

                                            <div class="form-group">
                                                <div class="input-group">
                                                    
                                                    <input style="border: 1px solid #253C80" wire:model="price" value="0" type="number" min="0" class="form-control"  placeholder="ادخل المبلغ">
                                                </div>
                                            </div>
                                        @else
                                        
                                        
                                            @if(count($row->Student->checkMonthlySalary->Salary) != count($row->Student->Subjects))
                                                @if($row->Student->checkMonthlySalary->checkMonthlySubjects && $row->Student->checkMonthlySalary->checkMonthlySubjects->teacher != $teacher  )
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="form-control" >{{ $row->Student->checkMonthlySalary->Salary[0]->price }} +</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
    
                                                                <input style="border: 1px solid #253C80" wire:model="price" value="0" type="number" min="0" class="form-control"  placeholder="ادخل المبلغ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                @else
                                                @endif

                                            @else
                                            @endif
                                            

                                        @endif
                                    @endif
                                    
                                    @error('price')
                                        <div class="form-group row mt-2">
                                            <div class="col-lg-12">
                                                    <div class="form-group text-center bg-danger p-2 error">
                                                        <p style="font-size: .8em;color:#fff">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                    @if($row->Student->status == "perDay")
                                        @if(count($row->Student->Salary->where('student',$row->Student->id)->where('month',$month)->where('year',$year)->where('day',$day)) > 0)
                                        @else
                                            <select multiple data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المادة"
                                                wire:model="selectedSubjects" name="selectedSubjects" class="form-control cairo p-2" aria-label="Username" aria-describedby="basic-selectedSubjects">
                                                <option value="all" class="cairo input-group-text">كل المواد</option>
                                                @foreach ($row->Student->Subjects as $subject)
                                                    <option value="{{ $subject->Teacher->id }}" class="cairo input-group-text">{{  $subject->Teacher->Subject->name }} - {{ $subject->Teacher->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        @endif
                                    @else
                                        @if( $row->Student->checkMonthlySalary  == null )

                                            <select multiple data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المادة"
                                                wire:model="selectedSubjects" name="selectedSubjects" class="form-control cairo p-2" aria-label="Username" aria-describedby="basic-selectedSubjects">
                                                <option value="all" class="cairo input-group-text">كل المواد</option>
                                                @foreach ($row->Student->Subjects as $subject)
                                                    
                                                    <option value="{{ $subject->Teacher->id }}" class="cairo input-group-text">{{  $subject->Teacher->Subject->name }} - {{ $subject->Teacher->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        @else
                                        
                                        
                                            @if(count($row->Student->checkMonthlySalary->Salary) != count($row->Student->Subjects))
                                                @if($row->Student->checkMonthlySalary->checkMonthlySubjects && $row->Student->checkMonthlySalary->checkMonthlySubjects->teacher != $teacher  )
                                                    @php
                                                        $teachers = [];
                                                    @endphp
                                                    @foreach ($row->Student->checkMonthlySalary->checkMonthlySubjectsNew as $subject)
                                                        @php
                                                            array_push($teachers,$subject->teacher);
                                                        @endphp
                                                    @endforeach

                                                    <select multiple data-pharaonic="select2" data-component-id="{{ $this->id }}" data-dir="rtl" data-language="ar" data-search-on data-placeholder="اختر المادة"
                                                        wire:model="selectedSubjects" name="selectedSubjects" class="form-control cairo p-2" aria-label="Username" aria-describedby="basic-selectedSubjects">
                                                            @if(count($row->Student->Subjects->whereNotIn('teacher',$teachers)) == count($row->Student->Subjects))
                                                                <option value="all" class="cairo input-group-text">كل المواد</option>
                                                            @endif
                                                            @foreach ($row->Student->Subjects->whereNotIn('teacher',$teachers) as $subject)
                                                        
                                                                @if( $row->Student->checkMonthlySalary->checkMonthlySubjects->where('teacher','!=',$subject->Teacher->id))
                                                                    <option value="{{ $subject->Teacher->id }}" class="cairo input-group-text">{{  $subject->Teacher->Subject->name }} - {{ $subject->Teacher->name }}</option>

                                                                @endif
                                                            
                                                        @endforeach
                                                        
                                                    </select> 
                                                @else
                                                @endif

                                            @else
                                            @endif
                                            

                                        @endif
                                    @endif
                                    
                                    

                                    @error('selectedSubjects')
                                        <div class="form-group row mt-2">
                                            <div class="col-lg-12">
                                                    <div class="form-group text-center bg-danger p-2 error">
                                                        <p style="font-size: .8em;color:#fff">
                                                            {{ $message }}
                                                        </p>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    @enderror
                                    
                                            
                                </td>
                                
                               
                                
                                <td>
                                    @if($row->Student->status == "perDay")
                                        @if(count($row->Student->Salary->where('student',$row->Student->id)->where('month',$month)->where('year',$year)->where('day',$day)) > 0)
                                        @else
                                            <button class="btn edit" wire:click="pay({{ $row->Student->id }},{{ $row->Student->checkMonthlySalary != '' ? $row->Student->checkMonthlySalary : '' }})"><i class="fa fa-save"></i></button>
                                        @endif
                                    @else
                                        @if( $row->Student->checkMonthlySalary  == null )

                                            <button class="btn edit" wire:click="pay({{ $row->Student->id }},{{ $row->Student->checkMonthlySalary != '' ? $row->Student->checkMonthlySalary : '' }})"><i class="fa fa-save"></i></button>
                                        @else
                                        
                                        
                                            @if(count($row->Student->checkMonthlySalary->Salary) != count($row->Student->Subjects))
                                                @if($row->Student->checkMonthlySalary->checkMonthlySubjects && $row->Student->checkMonthlySalary->checkMonthlySubjects->teacher != $teacher  )
                                                    <button class="btn edit" wire:click="pay({{ $row->Student->id }},{{ $row->Student->checkMonthlySalary != '' ? $row->Student->checkMonthlySalary : '' }})"><i class="fa fa-save"></i></button>
                                                @else
                                                @endif

                                            @else
                                            @endif
                                            

                                        @endif
                                    @endif


                                    
                                    @if(Auth::user()->role == 'Admin')
                                        <button class="btn delete" wire:click="delete({{ $row->id }})"><i class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                  
                    @endif
                    
                </tbody>
               
            </table>
        </div>
            
    </div>

