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

    public function addBankField(): void
    {


        $this->form->bank_references[] = '';
    }

    public function deleteBankField ($key) : void 
    {
        unset($this->form->bank_references[$key]);
    }

    public function addCommercialField(): void
    {


        $this->form->commercial_references[] = '';
    }

    public function deleteCommercialField ($key) : void 
    {
        unset($this->form->commercial_references[$key]);
    }

    public function save()
    {
        $data = $this->form->validate();

        try {
            DB::beginTransaction();
            $client = Client::create($data);

            if ($client) {
                DB::commit();
                $this->form->reset();
                $this->dispatch('success');
            }

        } catch (\Exception $e) {

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

        $this->addBankField();
        $this->addCommercialField();
    }

    public function render()
    {
        return view('livewire.client-create');
    }
}
