<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;

    protected $table = 'reservation_services';

    protected $primaryKey = 'id_reservation_service';

    protected $fillable = [
        'id_reservation',
        'id_service',
        'total_price',
    ];

    /**
     * Get the reservation associated with the reservation service.
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_reservation');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_reservation_service','id_reservation_service');
    }
    /**
     * Get the service associated with the reservation service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
