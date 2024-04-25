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
        'driver_id',
        'accepted_by_delivery',
        'awaiting_for_delivery',
        'delivered',
    ];

    public function assign(int $driver_id): array
    {
        $response = [];

        if (
            $this->on_delivery &&
            \Auth::user()->role_id !== 1
        ) {
            $response = [
                'status' => false,
                'message' => __('No puedes asignar una órden de despacho que está en proceso de entrega'),
            ];
        } else if (
            \Auth::user()->role_id === 1 &&
            $this->on_delivery &&
            $this->accepted_by_delivery == false
        ) {
            $response = [
                'status' => true,
                'message' => __('Asignación forzada exitosa'),
            ];

            $this->driver_id = $driver_id;
            $this->on_delivery = true;
            $this->save();

        } else {
            $response = [
                'status' => true,
                'message' => __('Asignación exitosa'),
            ];

            $this->driver_id = $driver_id;
            $this->on_delivery = true;
            $this->save();
        }

        return $response;
    }

    public function cancel(): array
    {
        $data = [];
        if ($this->status == false) {
            $data = [
                'status' => false,
                'message' => __('Esta orden de despacho ha sido anulada previamente'),
            ];

        } else if ($this->on_deliver == true) {
            $data = [
                'status' => false,
                'message' => __('No puedes anular una orden de despacho en proceso de envio'),
            ];
        } else {
            $data = [
                'status' => true,
                'message' => '',
            ];

            $this->status = false;
            $this->save();

            $orderStatus = [
                'order_id' => $this->order->id,
                'creator_id' => \Auth::id(),
                'status' => 'Orden de despacho cancelada',
                'comment' => 'La órden de desapacho ' . $this->id . ' ha sido anulada. ',
            ];

            OrderHistory::create($orderStatus);

            $order = Order::find($this->order_id);

            $items = [];
            foreach ($order->items as $orderKey => $item) {
                foreach ($this->items as $dispatchKey => $dispatchItem) {

                    \Log::info($item);
                    \Log::info($dispatchItem);
                    if ($dispatchItem['name'] == $item['name']) {
                        $newQuantity = $item['remaining_quantity'] + $dispatchItem['dispatchQuantity'];
                        $item['remaining_quantity'] = $newQuantity;
                    }

                    $items[] = $item;
                }
            }


            $order->items = $items;
            $order->save();
        }
        return $data;
    }

    public function accept(int | null $driver_id = null): array
    {
        $response = [];

        if ($this->accepted_by_delivery == true) {
            $response = [
                'status' => false,
                'message' => __('Este pedido ya ha sido asignado, no se puede reasignar. Contacte al administrador.'),
            ];
        }  else {
            $response = [
                'status' => true,
                'message' => __('Orden de despacho aceptada exitosamente.'),
            ];

            $this->accepted_by_delivery = true;
            $this->save();

            $orderStatus = [
                'order_id' => $this->order->id,
                'creator_id' => \Auth::id(),
                'status' => 'Orden de despacho en tránsito',
                'comment' => 'La órden de desapacho ' . $this->id . ' está en tránsito a destino indicado. ',
            ];

            OrderHistory::create($orderStatus);

        }

        return $response;
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s'),
        );
    }

    public function deliver ($signature) : array
    {
        $response = [];


        return $response;
    }

    public function items(): Attribute
    {
        return Attribute::make(
            set: fn(array $items) => serialize($items),
            get: fn(string $items) => unserialize($items),
        );
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
