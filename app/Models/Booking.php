<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'full_name',
        'check_in',
        'check_out',
        'special_request',
        'phone',
        'email',
        'room_id'
    ];

    public $timestamps = false;


    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
