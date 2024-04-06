<?php

namespace App\Livewire;

use Livewire\Component;

use App\Livewire\Forms\PersonTypeCreateForm;
use App\Models\PersonType;

class PersonTypeCreate extends Component
{
    public PersonTypeCreateForm $form;

    public function save () : void 
    {
        $data = $this->form->validate();

        


    }
    public function render()
    {
        return view('livewire.person-type-create');
    }
}
