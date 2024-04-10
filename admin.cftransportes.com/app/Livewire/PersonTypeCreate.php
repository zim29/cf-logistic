<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Livewire\Forms\PersonTypeCreateForm as Form;
use App\Models\PersonType as Model;

class PersonTypeCreate extends Component
{
    public Form $form;

    public function save () : void 
    {
        $data = $this->form->validate();

        try {
            DB::beginTransaction();

            $model = Model::create($data);

            if($model)
            {
                $this->form->reset();
                $this->dispatch('success');
                DB::commit();
            }
            
        } catch ( \Exception $e ) {

            $this->dispatch('error');
            $class = get_class($this);
            $errorMessage = $e->getMessage();
            \Log::error("Error in $class. $errorMessage");
        }


    }

    public function mount() : void 
    {
        $this->authorize('create', Model::class);
    }
    public function render()
    {
        return view('livewire.person-type-create');
    }
}
