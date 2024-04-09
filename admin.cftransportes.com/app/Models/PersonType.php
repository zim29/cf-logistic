<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Traits\SearchableTrait;

class PersonType extends Model
{

    use SearchableTrait;

    protected $searchableFields = ['name'];

    protected $searchableRelations = [
        'creator' => ['name'],
    ];
    
    protected $fillable = [
        'name',
        'status',
        'creator_id',
    ];

    public function createdAt () : Attribute
    {
        return new Attribute(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    public function creator ( )
    {
        return $this->belongsTo( User::class, 'creator_id' );
    }
}
