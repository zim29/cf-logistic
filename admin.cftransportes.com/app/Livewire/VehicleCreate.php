<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Livewire\Forms\VehicleCreateForm as Form;
use App\Models\Vehicle as Model;
use App\Models\VehicleType;

class VehicleCreate extends Component
{
    public Form $form;
    public array $vehicleTypes;

    public function save () : void 
    {
        $this->authorize('create', Model::class);
        
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

    public function mount () : void
    {
        $this->authorize('create', Model::class);
        $this->vehicleTypes = VehicleType::where('status', true)->pluck('name','id')->toArray();
    }

    public function render()
    {
        return view('livewire.vehicle-create');
    }
}
