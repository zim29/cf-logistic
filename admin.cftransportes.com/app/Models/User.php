<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\SearchableTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SearchableTrait;

    protected $searchableFields = ['name', 'email'];

    protected $searchableRelations = [
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'client_id',
        'warehouse_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class, 'driver_id');
    }

    public function dispatchOrder()
    {
        return $this->hasMany(DispatchOrder::class, 'driver_id');
    }

    public function getAwatingDispatchOrders()
    {
        $query = $this->dispatchOrder
            ->where('driver_id', $this->id)
            ->where('accepted_by_delivery', false);

        return $query;
    }

    public function getInProcessDispatchOrders()
    {
        $query = $this->dispatchOrder
            ->where('driver_id', $this->id)
            ->where('accepted_by_delivery', true);

        return $query;
    }
}
