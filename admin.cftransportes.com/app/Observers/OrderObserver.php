<?php

namespace App\Observers;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

use App\Models\Order;
use App\Models\OrderHistory;

class OrderObserver implements ShouldHandleEventsAfterCommit
{
    public function created(Order $order)
    {
        $data = [
            'order_id' => $order->id,
            'creator_id' => $order->creator_id,
            'status' => 'Orden generada',
            'comment' => 'Orden generada exitosamente',
        ];

        OrderHistory::create($data);
    }

    public function updating(Order $order)
    {
        if($order->isDirty('is_approved'))
        {
            $data = [
                'order_id' => $order->id,
                'creator_id' => \Auth::id(),
                'status' => 'Orden aprobada',
                'comment' => 'La orden ha sido aprobada y está en proceso de despacho',
            ];
    
            OrderHistory::create($data);
        }
    }
}
