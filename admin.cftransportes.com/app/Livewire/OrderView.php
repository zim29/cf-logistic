<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Order as Model;

class OrderView extends Component
{
    public Model $order;
    public function mount (Model $item) {
        $this->order = $item;
    }

    public function approve () {
        if($this->order->approve() ) $this->dispatch("success");
        else $this->dispatch('error');
    }
    public function render()
    {
        return view('livewire.order-view');
    }
}
