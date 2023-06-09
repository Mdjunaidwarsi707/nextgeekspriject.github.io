<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ApplyForm extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'roles_id',
        'roles_name',
        'name',
        'email',
        'mobile',
        'year',
        'month',
        'qualification',
        'notice_period',
        'resume',
        'status',
        'career_tracking',
    ];
}
