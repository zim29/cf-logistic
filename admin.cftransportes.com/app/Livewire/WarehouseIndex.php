<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Warehouse as Model;

class WarehouseIndex extends Component
{
    public $search = '';
    public $resuts;

    public function updatedSearch() : void 
    {
        $this->results = Model::search($this->search)->get();
    }

    public function mount () : void 
    {
        $this->results = Model::search($this->search)->get();
    }

    public function render()
    {
        return view('livewire.warehouse-index');
    }
}
