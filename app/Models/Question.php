<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = "question";
    protected $primaryKey = 'id';
    protected $fillable = [
        'number_for_exam',
        'paragraph',
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_answer',
        'image',
        'audio',
        'exam_id',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
