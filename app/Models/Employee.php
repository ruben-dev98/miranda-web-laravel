<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'id',
        'photo',
        'full_name',
        'email',
        'start_date',
        'description',
        'job',
        'contact',
        'status',
        'password'
    ];
}
