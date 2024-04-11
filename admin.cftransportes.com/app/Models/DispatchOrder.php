<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Traits\SearchableTrait;


class DispatchOrder extends Model
{
    use HasFactory, SearchableTrait;

    protected $searchableFields = ['id',];

    protected $searchableRelations = [
        'order' => ['id'],
        'creator' => ['name'],
    ];

    protected $fillable = [
        'order_id',
        'creator_id',
        'items',
        'destination',
        'on_delivery',
        'status',
        'warehouse_id',
    ];

    public function cancel () : array
    {
        $data = [];
        if($this->status == false)
        {
            $data = [
                'status' => false,
                'message' => __('Esta orden de despacho ha sido anulada previamente'),
            ];

        }
        else if ($this->on_deliver == true)
        {
            $data = [
                'status' => false,
                'message' => __('No puedes anular una orden de despacho en proceso de envio'),
            ];
        }
        else 
        {
            $data = [
                'status' => true,
                'message' => '',
            ];

            $this->status = false;
            $this->save();

            $orderStatus = [
                'order_id' => $this->id,
                'creator_id' => \Auth::id(),
                'status' => 'Orden de despacho cancelada',
                'comment' => 'La órden de desapacho ' . $this->id . ' ha sido anulada. ',
            ];
    
            OrderHistory::create($orderStatus);
        }
        return $data;
    }

    public function createdAt () : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    public function items () : Attribute
    {
        return Attribute::make(
            set: fn (array $items) => serialize($items),
            get: fn (string $items) => unserialize($items),
        );
    }

    public function order()
    {
        return $this->belongsTo( Order::class );
    }

    public function creator () {
        return $this->belongsTo( User::class, 'creator_id' );
    }

    public function warehouse () {
        return $this->belongsTo( Warehouse::class );
    }
}
