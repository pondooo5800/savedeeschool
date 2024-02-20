<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registerlog extends Model
{
    use HasFactory;

    protected $table = 'registerlogs';
    public $timestamps = true;


    protected $fillable = [
        'course',
        'name',
        'phone',
        'line',
    ];
}
