<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\PersonType as Model;
use App\Livewire\Forms\PersonTypeEditForm as Form;

class PersonTypeView extends Component
{

    public Model $model;
    public Form $form;

    public $editMode = false;
    public array $statusOptions;

    public function toggleEdit () : void 
    {
        $this->editMode = !$this->editMode;
    }

    public function save () : void 
    {
        $data = $this->form->validate();

        try {
            
            DB::beginTransaction();
            
            $isUpdated = $this->model->update($data);

            if($isUpdated)
            {
                $this->toggleEdit();
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

    public function mount ( Model $item) : void 
    {
        $this->model = $item;
        $this->statusOptions = [
            "1" => __('Activo'),
            "0" => __('Inactivo'),
        ];

        $this->form->fill( 
            $item->only('name', 'status'), 
        ); 
    }
    
    public function render()
    {
        return view('livewire.person-type-view');
    }
}
