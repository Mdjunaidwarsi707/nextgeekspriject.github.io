<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'client_name',
        'client_email',
        'client_mobile',
        'client_state',
        'client_address',
        'client_landmark',
    ];
}
