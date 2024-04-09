<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Order as Model;

use Livewire\WithPagination;

class OrderIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $order_id = '';

    public function updatedSearch() 
    {
        $this->resetPage();
    }

    public function assignOrder () 
    {
        return redirect()->route('order-history', $this->order_id);
    }

    public function showOrderHistory () 
    {
        return redirect()->route('order-history', $this->order_id);
    }

    public function render()
    {
        return view('livewire.order-index', [
            'results' => Model::search($this->search)->simplePaginate(5),
        ]);
    }
}
