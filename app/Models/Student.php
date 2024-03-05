<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    public $timestamps = true;

    protected $fillable = [
        'email',
        'name',
        'phone',
        'student_number',
        'access_code',
        'logged_in',
        'current_quiz',
        'created_at',
    ];

    // public function user_quizzes()
    // {
    //     return $this->hasMany(UserQuiz::class, 'user_id');
    // }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrolments')->withTimestamps();
    }
}