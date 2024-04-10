<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as Model;

use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch() 
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.user-index', [
            'results' => Model::search($this->search)->simplePaginate(5),
        ]);
    }
}
