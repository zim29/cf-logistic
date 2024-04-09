<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ClientEditForm;

use Illuminate\Support\Facades\DB;

use App\Models\PersonType;
use App\Models\TaxClassification;
use App\Models\Client as Model;

class ClientView extends Component
{

    public ClientEditForm $form;

    public Model $model;

    public $editMode = false;

    public array $personTypes;
    public array $taxClassifications;

    public function toggleEdit(): void
    {
        $this->editMode = !$this->editMode;
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

    public function mount(Model $item): void
    {
        $this->personTypes = PersonType::select('id', 'name')
            ->where('status', true)
            ->pluck('name', 'id')
            ->toArray();

        $this->taxClassifications = TaxClassification::select('id', 'name')
            ->where('status', true)
            ->pluck('name', 'id')
            ->toArray();
        $this->model = $item;


        $this->form->fill(
            $item,
        );

    }
    public function render()
    {
        return view('livewire.client-view');
    }
}
