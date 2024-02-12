<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    public $timestamps = true;

    
    protected $fillable = [
        'question',
        'description',
        'image_name',
        'question_type',
        'quiz_id',
        'question_options',
        'question_answers',
        'created_at'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    public function get_options_list()
    {
        $optionsJson = json_decode($this->question_options);

        return $optionsJson->options;
    }
}
