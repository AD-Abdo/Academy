<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSubject extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['student','teacher','day','month','year'];

    public function Student()
    {
        return $this->belongsTo(Students::class,'student','id');
    }

    public function Teacher()
    {
        return $this->belongsTo(Teachers::class,'teacher','id');
    }
}
