<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','phone','pay','perDay','discount','free','subject'];


    public function Subject()
    {
        return $this->belongsTo(Subjects::class,'subject','id');
    }

    public function Attendance()
    {
        return $this->hasMany(TeacherAttendance::class,'teacher','id');
    }

    public function StudentAttendance()
    {
        return $this->hasMany(StudentAttendance::class,'teacher','id');
    }

    public function StudentsCount()
    {
        return $this->hasMany(StudentSubject::class,'teacher','id');
    }
}
