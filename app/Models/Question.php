<?php

namespace App\Models;

use App\Models\OnlineExam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['exam_id', 'pdf_path'];

    public function onlineExam()
    {
        return $this->belongsTo(OnlineExam::class, 'exam_id');
    }
}
