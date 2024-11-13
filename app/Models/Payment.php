<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

    protected $fillable = [
        'id_reservation_service',
        'id_staff',
        'amount',
        'payment_date',
        'payment_method',
        'payment_status',
    ];

    /**
     * Get the reservation associated with the payment.
     */
    public function reservationService()
    {
        return $this->belongsTo(ReservationService::class, 'id_reservation_service','id_reservation_service');
    }

    /**
     * Get the staff associated with the payment.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff');
    }
}
