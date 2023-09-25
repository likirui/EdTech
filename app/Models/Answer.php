<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'exam_id',
        'question_id',
        'answer_text',
        'is_correct',
        'submitted_at',
    ];
}
