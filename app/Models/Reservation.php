<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey = 'id_reservation';

    protected $fillable = [
        'id_guest',
        'id_room',
        'id_staff',
        'id_service',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'total_price' => 'decimal:2'
    ];

    /**
     * Get the guest associated with the reservation.
     */
    public function guest()
    {
        return $this->belongsTo(Guest::class, 'id_guest','id_guest');
    }

    /**
     * Get the room associated with the reservation.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room','id_room');
    }

    /**
     * Get the staff associated with the reservation.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff','id_staff');
    }

    /**
     * Get the payment associated with the reservation.
     */

     public function payment()
     {
         return $this->hasOne(Payment::class, 'id_reservation','id_reservation');
     }
    

    /**
     * Get the services associated with the reservation.
     */

    // In Reservation.php
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id_service');
    }

}
