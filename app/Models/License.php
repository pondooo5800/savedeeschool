<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $table = 'licenses';
    public $timestamps = true;


    protected $fillable = [
        'title',
        'description',
        'imageName',
        'content',
    ];
}
