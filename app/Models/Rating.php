<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'comment',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }
}