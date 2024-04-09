<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Vehicle as Model;

class VehicleIndex extends Component
{

    use WithPagination;

    public $search = '';

    public function updatedSearch() 
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.vehicle-index', [
            'results' => Model::search($this->search)->simplePaginate(5),
        ]);
    }
}
