<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide_banner_homepage extends Model
{
    use HasFactory;
    protected $table = 'slide_banner_homepages';
    protected $fillable = [
        'title', 'image', 'content', 'status'
    ];
}
