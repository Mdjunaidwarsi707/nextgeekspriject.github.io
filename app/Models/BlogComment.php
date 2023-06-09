<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'cm_blog_id',
        'cm_blog_name',
        'cm_name',
        'cm_email',
        'cm_mobile',
        'cm_comment',
        're_blog_subid',
        're_name',
        're_email',
        're_mobile',
        're_comment',
    ];
}
