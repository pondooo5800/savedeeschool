<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use Carbon\Carbon;

class UserQuiz extends Model
{
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function get_duration()
    {
        $quiz          = $this->quiz;
        $quiz_lb       = $quiz->duration_lb;
        $quiz_duration = $quiz->duration;
        $duration_seconds = 0;
        if ($quiz_lb == 'hour') {
            $duration_seconds = $quiz_duration * 3600;
        } else if ($quiz_lb == 'minute') {
            $duration_seconds = $quiz_duration * 60;
        }

        return $duration_seconds;
    }

    public function get_time_remaining()
    {
        $quiz          = $this->quiz;
        $quiz_lb       = $quiz->duration_lb;
        $quiz_duration = $quiz->duration;
        $duration_seconds = 0;
        $separator = ':';
        if ($quiz_lb == 'hour') {
            $duration_seconds = $quiz_duration * 3600;
        } else if ($quiz_lb == 'minute') {
            $duration_seconds = $quiz_duration * 60;
        }

        $diff          = false;
        if ($quiz_duration && $quiz_duration >= 0) {
            $diff = (new \DateTime("now"))->getTimestamp()  - strtotime($this->start_time);
            $diff =  $duration_seconds - $diff;
            if ( $diff <= 0 ) {
				$diff = 0;
            } 

            return $diff;
        }

        return $diff;
    }

    public function get_timetaken_html()
    {
        $seconds = $this->time_taken;
        $separator = ':';
        return sprintf("%02d%s%02d%s%02d", floor($seconds / 3600), $separator, ($seconds / 60) % 60, $separator, $seconds % 60);
    }

    public function getQuestionList()
    {
        $qns_ans_list = json_decode($this->question_answers, true);
        $list = $qns_ans_list['qns_ans'];
        return $list;
    }

}