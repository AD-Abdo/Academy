<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSalary extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['student','price','day','month','year'];

    
    public function Salary()
    {
        return $this->hasMany(StudentSalarySubjects::class,'salary','id');
    }
    public function Subjects()
    {
        return $this->hasMany(StudentSalarySubjects::class,'salary','id');
    }

    public function checkMonthlySubjectsNew()
    {
        return $this->hasMany(StudentSalarySubjects::class,'salary','id')->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'));
    }

    public function checkMonthlySubjects()
    {
        return $this->hasOne(StudentSalarySubjects::class,'salary','id')->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'));
    }

    

    public function Student()
    {
        return $this->belongsTo(Students::class,'student','id');
    }

    public function getStudent()
    {
        return $this->hasOne(Students::class,'student','id');
    }
   
}
