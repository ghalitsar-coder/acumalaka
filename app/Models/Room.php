<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'id_room';
    
    protected $fillable = [
        'room_number',
        'room_type',
        'capacity',
        'price_per_night',
        'status',
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'id_room');
    }
}
