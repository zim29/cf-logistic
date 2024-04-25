<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\DispatchOrder;
use App\Livewire\Forms\DispatchOrderDeliverForm;

class DispatchOrderDeliver extends Component
{
    public $dispatchOrder;
    public DispatchOrderDeliverForm $form;

    public $signature;

    public $decodedSignature;

    public function mount (DispatchOrder $item)
    {

        $this->authorize('accept', $item);

        $this->dispatchOrder = $item;
        $this->form->items = $item->items;


    } 
    
    public function save () : void
    {
        $this->decodedSignature = base64_decode($this->signature);
        $this->authorize('accept', $this->dispatchOrder);
        
        $response = $this->dispatchOrder->deliver($this->decodedSignature);

        if($response['status'])
        {
            $this->dispatch('success', $response['message']);
        } 
        else
        {
            $this->dispatch('error', $response['message']);
        } 
        
    }   
    public function render()
    {
        return view('livewire.dispatch-order-deliver');
    }
}
