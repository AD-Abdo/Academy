<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSalarySubjects extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['salary','teacher','price','day','month','year'];

    public function Salary()
    {
        return $this->belongsTo(StudentSalary::class,'salary');
    }

    public function getSalary()
    {
        return $this->hasOne(StudentSalary::class,'salary');
    }
    

    public function Teacher()
    {
        return $this->belongsTo(Teachers::class,'teacher','id');
    }
}
