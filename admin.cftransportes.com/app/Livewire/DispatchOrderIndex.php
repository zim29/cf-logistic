<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DispatchOrder as Model;

use Livewire\WithPagination;

class DispatchOrderIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $order_id = '';

    public function createDispatchOrder()
    {
        return redirect()->route('dispatch-create');
    }

    public function updatedSearch() 
    {
        $this->resetPage();
    }


    public function showOrderHistory () 
    {
        return redirect()->route('order-history', $this->order_id);
    }

    public function showOrder () 
    {
        return redirect()->route('order-view', $this->order_id);
    }

    public function cancelOrder () 
    {
        $order = Model::find($this->order_id);
        $cancelationStatus = $order->cancel();

        if($cancelationStatus['status']) $this->dispatch('success');
        else $this->dispatch('error', message: $cancelationStatus['message']);
    }

    public function mount () {
    }

    public function render()
    {
        return view('livewire.dispatch-order-index', [
            'results' => Model::search($this->search)->simplePaginate(5),
        ]);
    }
}
