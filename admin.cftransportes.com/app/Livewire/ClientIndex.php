<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Client as Model;

use Livewire\WithPagination;

class ClientIndex extends Component
{

    use WithPagination;

    public $search = '';

    public function updatedSearch() 
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.client-index', [
            'results' => Model::search($this->search)->simplePaginate(5),
        ]);
    }
}
