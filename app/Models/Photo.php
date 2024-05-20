<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photo';
    protected $fillable = [];

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class);
    }
}
