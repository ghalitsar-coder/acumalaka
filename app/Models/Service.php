<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $primaryKey = 'id_service';

    protected $fillable = [
        'service_name',
        'description',
        'price',
    ];

    /**
     * Get the reservation services associated with the service.
     */
    public function reservationServices()
    {
        return $this->hasMany(ReservationService::class, 'id_service');
    }
}
