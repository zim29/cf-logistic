<?php

namespace App\Observers;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

use App\Models\DispatchOrder;
use App\Models\Order;
use App\Models\OrderHistory;

class DispatchOrderObserver implements ShouldHandleEventsAfterCommit
{
    public function created(DispatchOrder $dispatchOrder)
    {
        $order = $dispatchOrder->order;
        \Log::info($dispatchOrder);
        $destination = !$dispatchOrder->warehouse_id ? 'cliente' : 'Almacén: ' . $dispatchOrder->warehouse->name;

        $data = [
            'order_id' => $order->id,
            'creator_id' => \Auth::id(),
            'status' => 'Orden de despacho',
            'comment' => 'La órden ha sido enviada a ' . $destination,
        ];

        OrderHistory::create($data);

        $items = [];
        foreach($order->items as $orderKey => $item) 
        {
            foreach($dispatchOrder->items as $dispatchKey => $dispatchItem) {

                \Log::info($item);
                \Log::info($dispatchItem);
                if($dispatchItem['name'] == $item['name']) 
                {
                    $newQuantity = $item['remaining_quantity'] - $dispatchItem['dispatchQuantity'];
                    $item['remaining_quantity'] = $newQuantity;
                }
                
                $items[] = $item;
            }
        }


        $order->items = $items;
        $order->save();

    }
}
