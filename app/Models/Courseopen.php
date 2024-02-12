<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courseopen extends Model
{
    use HasFactory;

    protected $table = 'courseopens';
    public $timestamps = true;


    protected $fillable = [
        'title',
        'description',
        'image_name',
    ];

}