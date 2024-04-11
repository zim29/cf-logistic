<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Livewire\Forms\OrderCreateForm as Form;

use App\Models\Order;
use App\Models\Client;

class OrderCreate extends Component
{
    public Form $form;
    public $search = '';

    public Client | null $client;


    public function showClientDialog() {
        $this->dispatch('show-client-dialog');
    }

    public function addItemField () : void 
    {
        $newItem = [
            'name' => '',
            'quantity' => '',
            'unit' => '',
        ];

        $this->form->items[] = $newItem;
    }

    public function selectClient (Client $client) {
        $this->client = $client;
        $this->form->client_id = $client->id;
        $this->resetErrorBag('form.client_id');
        $this->dispatch('close-client-modal');
    }

    public function deleteItemField ($key) : void 
    {
        unset($this->form->items[$key]);
    }

    public function save() {

        $data = $this->form->validate();

        try{
            DB::beginTransaction();

            foreach ($data['items'] as $key => $item) {
                $data['items'][$key]['remaining_quantity'] = $item['quantity'];
            }

            $order = Order::create($data);

            if($order)
            {
                DB::commit();
                $this->form->reset();
                $this->dispatch('success');
            }

        } catch( \Exception $e ){
            DB::rollBack();
            $this->dispatch('error');
        }
    }

    public function mount () : void 
    {

        $this->addItemField();

    }

    public function render()
    {
        return view('livewire.order-create', [
            'results' => Client::search($this->search)->simplePaginate(5),
        ]);
    }
}
