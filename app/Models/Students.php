<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','phone','parentPhone','barcode','status','row','image'];


    public function Row()
    {
        return $this->belongsTo(Rows::class,'row','id');
    }
    public function Attendance()
    {
        return $this->hasMany(StudentAttendance::class,'student','id');
    }
    public function Salary()
    {
        return $this->hasMany(StudentSalary::class,'student','id');
    }

    public function Subjects()
    {
        return $this->hasMany(StudentSubject::class,'student','id');
    }

    public function checkSalary()
    {
        return $this->hasOne(StudentSalary::class,'student','id')->where('day',Carbon::now()->timezone('Africa/Cairo')->format('d'))->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'));
    }
    public function checkMonthlySalary()
    {
        return $this->hasOne(StudentSalary::class,'student','id')->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'));
    }

    public function checkMonthlyAttendance()
    {
        return $this->hasMany(StudentAttendance::class,'student','id')->where('month',Carbon::now()->timezone('Africa/Cairo')->format('m'))->where('year',Carbon::now()->timezone('Africa/Cairo')->format('Y'));
    }
}
