<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Order;

class OrderHistory extends Component
{
    public Order $order;

    public function mount (Order $item) : void 
    {
        $this->order = $item;
    }
    public function render()
    {
        return view('livewire.order-history');
    }
}
