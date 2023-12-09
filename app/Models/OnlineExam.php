<?php

namespace App\Models;

use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'subject',
        'start_date',
        'time',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
