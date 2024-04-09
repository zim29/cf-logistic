<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ClientCreateForm;

use Illuminate\Support\Facades\DB;

use App\Models\PersonType;
use App\Models\TaxClassification;
use App\Models\Client;

class ClientCreate extends Component
{
    public ClientCreateForm $form;

    public array $personTypes;
    public array $taxClassifications;

    public function updated($field)
    {
        $this->form->validateOnly($field);
    }

    public function save()
    {
        $data = $this->form->validate();

        try {
            DB::beginTransaction();
            $client = Client::create($data);

            if($client) 
            {
                DB::commit();
                $this->form->reset();
                $this->dispatch('success');
            }

        } catch ( \Exception $e) {
            
            $this->dispatch('error');
            $class = get_class($this);
            $errorMessage = $e->getMessage();
            \Log::error("Error in $class. $errorMessage");

        }

    }

    public function mount(): void
    {
        $this->personTypes = PersonType::select('id', 'name')
                                            ->where('status', true)
                                            ->pluck('name', 'id')
                                            ->toArray();
        $this->taxClassifications = TaxClassification::select('id', 'name')
                                            ->where('status', true)
                                            ->pluck('name', 'id')
                                            ->toArray();
    }

    public function render()
    {
        return view('livewire.client-create');
    }
}
