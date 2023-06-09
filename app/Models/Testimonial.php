<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
     protected $fillable = [
        'test_name',
        'test_role',
        'test_message',
        'test_image'
    ];
}
