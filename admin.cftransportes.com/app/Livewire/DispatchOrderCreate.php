<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Livewire\Forms\DispatchOrderCreateForm as Form;

use App\Models\Order;
use App\Models\Warehouse;
use App\Models\DispatchOrder;

class DispatchOrderCreate extends Component
{

    public Form $form;
    public $destiny;
    public array $warehouses;

    public $search = '';

    public Order $order;

    public function updatedFormDestiny(bool $value)
    {
        if($value) $this->form->warehouse_id = '';
    }


    public function showOrderDialog() {
        $this->dispatch('show-order-dialog');
    }


    public function selectOrder (Order $order) {
        $this->order = $order;
        $this->form->order_id = $order->id;
        $this->form->items = $this->order->items;
        $this->resetErrorBag('form.order_id');
        $this->dispatch('close-order-modal');
    }

    public function deleteItemField ($key) : void 
    {
        unset($this->form->items[$key]);
    }

    public function save() {
        $this->authorize('create', DispatchOrder::class);

        $this->form->validate([
            'items.*.dispatchQuantity' => ['required','integer','min:0'],
        ]); 
        
        $data = $this->form->validate();

        if( $data['warehouse_id'] === '' ) $data['warehouse_id'] = null;
        
        try{
            DB::beginTransaction();

            $order = DispatchOrder::create($data);

            if($order)
            {
                DB::commit();
                $this->form->reset();
                $this->dispatch('success');
            }

        } catch( \Exception $e ){
            DB::rollBack();
            \Log::error($e);
            $this->dispatch('error');
        }
    }

    public function mount () : void 
    {
        $this->authorize('create', DispatchOrder::class);
        $this->warehouses = Warehouse::select('id', 'name')
                                        ->where('status', true)
                                        ->pluck('name', 'id')
                                        ->toArray();
        

    }


    public function render()
    {
        return view('livewire.dispatch-order-create', [
            'results' => Order::search($this->search)
            ->where('status', true)
            ->where('is_approved', true)
            ->simplePaginate(5),
        ]);
    }
}
