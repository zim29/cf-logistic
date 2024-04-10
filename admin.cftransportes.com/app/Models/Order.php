<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Traits\SearchableTrait;

class Order extends Model
{
    use HasFactory, SearchableTrait;

    protected $searchableFields = ['id', ];

    protected $searchableRelations = [
        'creator' => ['name'],
        'client' => ['full_name'],
    ];

    public $casts = [
        'status' => 'boolean',
    ];

    protected $fillable = [
        'client_id',
        'pay_method_id',
        'items',
        'status',
        'is_approved',
        'creator_id',
    ];

    public function items () : Attribute
    {
        return Attribute::make(
            set: fn (array $items) => serialize($items),
            get: fn (string $items) => unserialize($items),
        );
    }

    public function approve () : bool
    {
        $this->is_approved = true;
        $this->save();

        return $this->wasChanged('is_approved');
    }


    public function createdAt () : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    public function creator () {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function client () {
        return $this->belongsTo( Client::class );
    }

    public function payMethod () {
        return $this->belongsTo( PayMethod::class );
    }

    public function history () {
        return $this->hasMany( OrderHistory::class );
    }
}
