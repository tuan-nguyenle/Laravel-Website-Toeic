<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'thumbnail', 'content', 'href_param', 'user_id', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
}
