<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'email',
        'phone',
        'hire_date',
    ];

    /**
     * Get the reservations associated with the staff.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_staff');
    }

    /**
     * Get the payments associated with the staff.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_staff');
    }
}
