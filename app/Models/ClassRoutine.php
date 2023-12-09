<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'days', 'start_time', 'end_time'];

    protected $casts = [
        'days' => 'array',
    ];
}
