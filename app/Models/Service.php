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
        'service_type',
        'description',
        'price',
    ];

    /**
     * Get the reservation services associated with the service.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'service_id', 'id_service');
    }
}
