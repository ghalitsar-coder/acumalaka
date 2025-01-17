<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $primaryKey = 'id_guest';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    /**
     * Get the reservations associated with the guest.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_guest');
    }
    public function getHasActiveReservationAttribute()
    {
        // Check if the guest has any reservation that is not checked out or cancelled
        return $this->reservations()->whereIn('status', ['confirmed', 'checked_in'])->exists();
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
