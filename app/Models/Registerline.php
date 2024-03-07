<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registerline extends Model
{
    use HasFactory;

    protected $table = 'registerlogs';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'phone',
        'line',
        'course',
    ];
}
