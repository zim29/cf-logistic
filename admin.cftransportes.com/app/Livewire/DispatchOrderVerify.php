<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\DispatchOrder;
use App\Livewire\Forms\DispatchOrderVerifyForm;

class DispatchOrderVerify extends Component
{

    public $dispatchOrder;
    public DispatchOrderVerifyForm $form;
    public function mount (DispatchOrder $item)
    {

        $this->authorize('accept', $item);

        $this->dispatchOrder = $item;
        $this->form->items = $item->items;


    } 

    public function save () : void
    {
        $this->authorize('accept', $this->dispatchOrder);
        $response = $this->dispatchOrder->accept();

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
        return view('livewire.dispatch-order-verify', [
            'results' => $this->dispatchOrder,
        ]);
    }
}
