<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    public $timestamps = true;


    protected $fillable = [
        'title',
        'description',
        'imageName',
        'content',
        'created_at'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrolments')->withTimestamps();
    }
}