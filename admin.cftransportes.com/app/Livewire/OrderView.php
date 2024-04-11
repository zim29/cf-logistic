<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Order as Model;
use App\Models\PayMethod;

class OrderView extends Component
{
    use WithFileUploads;
    public Model $order;
    public $pay_method_id = '';
    public $pay_method_reference = '';
    public array $payMethods;

    public $file;
    
    public function mount(Model $item)
    {
        $this->authorize("view", $item);
        $this->order = $item;

        $this->payMethods = PayMethod::where('status', true)->pluck('name', 'id')->toArray();

        if ($item->pay_method_id !== null)
        {
            $this->pay_method_id = $item->pay_method_id;
            $this->pay_method_reference = $item->pay_method_reference;
        }

    }

    public function updatePayMethod( )
    {
        $this->authorize('update', $this->order);
        
        if($this->pay_method_id === '') return;

        $this->order->pay_method_id = $this->pay_method_id;
        $this->order->pay_method_reference = $this->pay_method_reference;

        $this->order->save();
        if($this->file) $this->file->storeAs('confirmations',"payment-confirmation-" . $this->order->id, 'public');
        $this->dispatch('success');
    }

    public function approve()
    {
        $this->authorize("approve", $this->order);
        
        if(!$this->order->pay_method_id)
        {
            $this->dispatch('error', message: __('No puedes autorizar un despacho si no has reportado el pago del servicio.'));
            return;
        }

        if ($this->order->approve())
            $this->dispatch("success");
        else
            $this->dispatch('error');
    }
    public function render()
    {
        return view('livewire.order-view');
    }
}
