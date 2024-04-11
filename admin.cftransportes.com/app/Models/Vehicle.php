<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\SearchableTrait;

class Vehicle extends Model
{
    use HasFactory, SearchableTrait;

    protected $searchableFields = ['placard'];

    protected $searchableRelations = [
        'creator' => ['name'],
        'driver' => ['name'],
    ];

    protected $fillable = [
        'placard',
        'driver_id',
        'vehicle_type_id',
        'creator_id',
        'status',
    ];

    public function creator () {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function driver () {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function type () {
        return $this->belongsTo( VehicleType::class, 'vehicle_type_id' );
    }
}
