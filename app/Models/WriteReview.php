<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'r_client_id',
        'r_clientname',
        'r_client_mobile',
        'r_project_id',
        'r_project_title',
        'r_firstname',
        'r_lastname',
        'r_mobile',
        'r_review',
        'r_message',
        'total_review',
        'avg_review',
    ];
}
