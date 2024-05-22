<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'phone',
        'subject',
        'messages',
        'date',
        'is_read',
        'archived',
        'photo',
        'time_passed'
    ];
}
