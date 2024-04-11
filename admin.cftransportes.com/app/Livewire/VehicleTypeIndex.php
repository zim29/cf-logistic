<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\VehicleType as Model;

class VehicleTypeIndex extends Component
{
    public $search = '';
    public $resuts;

    public function updatedSearch() : void 
    {
        $this->results = Model::search($this->search)->get();
    }

    public function mount () : void 
    {
        $this->authorize('viewAny', Model::class);
        $this->results = Model::search($this->search)->get();
    }
    public function render()
    {
        return view('livewire.vehicle-type-index');
    }
}
