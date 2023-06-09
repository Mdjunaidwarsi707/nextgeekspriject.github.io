<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
     protected $fillable = [
        't_name',
        't_role',
        't_facebook',
        't_twitter',
        't_linkedin',
        't_instagram',
        't_image',
    ];
}
