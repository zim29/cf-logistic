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
            'comment' => 'Orden generada exitosamente',
            'status' => 'Orden generada'
        ];

        OrderHistory::create($data);
    }
}
