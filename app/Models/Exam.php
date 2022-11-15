<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'description', 'level'
    ];

    public function question()
    {
        return $this->hasMany('\App\Models\Question');
    }
}
