<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ClientCreateForm;

class ClientCreate extends Component
{
    public ClientCreateForm $form;

    public function updated ( $field )
    {
        $this->form->validateOnly($field);
    }

    public function save () 
    {
        $this->form->validate();
    }
    
    public function render()
    {
        return view('livewire.client-create');
    }
}
