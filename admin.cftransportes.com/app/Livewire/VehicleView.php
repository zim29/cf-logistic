<?php

namespace App\Livewire;

use Livewire\Component;

use App\Livewire\Forms\VehicleEditForm as Form;

use Illuminate\Support\Facades\DB;

use App\Models\Vehicle as Model;
use App\Models\User;

class VehicleView extends Component
{
    public $search = '';
    public User $driver;
    public Form $form;

    public Model $model;

    public array $statusOptions;

    public $editMode = false;


    public function toggleEdit(): void
    {
        $this->editMode = !$this->editMode;
    }

    public function selectDriver (User $driver) {
        $this->driver = $driver;
        $this->form->driver_id = $driver->id;
        $this->resetErrorBag('form.driver_id');
        $this->dispatch('close-driver-modal');
    }

    public function save(): void
    {
        $data = $this->form->validate();

        try {

            DB::beginTransaction();

            $isUpdated = $this->model->update($data);

            if ($isUpdated) {
                $this->toggleEdit();
                $this->dispatch('success');
                DB::commit();
            }

        } catch (\Exception $e) {

            $this->dispatch('error');
            $class = get_class($this);
            $errorMessage = $e->getMessage();
            \Log::error("Error in $class. $errorMessage");
        }


    }

    public function showDriverDialog() {
        $this->dispatch('show-driver-dialog');
    }

    public function mount ( Model $item) : void 
    {
        $this->model = $item;
        $this->statusOptions = [
            true => __('Activo'),
            false => __('Inactivo'),
        ];

        $this->form->fill( 
            $item 
        ); 
    }
    public function render()
    {
        return view('livewire.vehicle-view', [
            'results' => User::search($this->search)
                            ->whereHas('role', function ($query) {
                                $query->where('name','Delivery');
                            })->simplePaginate(5),
        ]);
    }
}
