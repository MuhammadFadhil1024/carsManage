<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'vechile_id', 'driver_id', 'approved_by_head_mine', 'approved_by_head_office', 'usage_date', 'end_of_usage_date', 'fuel_consumption', 'headOffice_id', 'headMine_id'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vechile_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
}
