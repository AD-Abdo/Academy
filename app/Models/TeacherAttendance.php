<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherAttendance extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['teacher','row','day','month','year'];

    public function Teacher()
    {
        return $this->belongsTo(Teachers::class,'teacher','id');
    }
}
