<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Question;
use App\Models\UserQuiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    public $timestamps = true;

    protected $casts = [
        'passing_grade' => 'float'
    ];

    protected $fillable = [
        'title',
        'description',
        'course_id',
        'review_qns',
        'show_answer',
        'random_qns',
        'show_pagination',
        'number_qns',
        'allow_rate',
        'duration_lb',
        'duration',
        'passing_grade',
        'available_on',
        'retake',
        'status',
        'qns_list',
        'access_code',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user_quizzes()
    {
        return $this->hasMany(UserQuiz::class);
    }

    public function get_duration()
    {
        $duration = $this->duration;
        $duration_lb = $this->duration_lb;
        if ($duration) {
            if ($duration_lb == 'hour') {
                $seconds = $duration * 60 * 60;
            } else {
                $seconds = $duration * 60;
            }
            return $seconds;
        } else {
            return 'Unlimited';
        }
    }

    public function get_duration_html()
    {
        $duration = $this->duration;
        $duration_lb = $this->duration_lb;
        $separator = ':';
        if ($duration) {
            if ($duration_lb == 'hour') {
                $seconds = $duration * 60 * 60;
            } else {
                $seconds = $duration * 60;
            }
            return sprintf("%02d%s%02d%s%02d", floor($seconds / 3600), $separator, ($seconds / 60) % 60, $separator, $seconds % 60);
        } else {
            return $duration = 'Unlimited';
        }
    }

    public function get_question_ids($id)
    {
        $question_ids = Question::where('quiz_id', $id)->pluck('id')->toArray();
        // dd($question_ids);
        return $question_ids;
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function getAverageRatings()
    {
        $ratings = $this->ratings();
        $count = $ratings->count();
        if ($count == 0) {
            return 0;
        }
        $total = $ratings->sum('rating');

        $average = $total / $count;
        return $average;
    }
}
