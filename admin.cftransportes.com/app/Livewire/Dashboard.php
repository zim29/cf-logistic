<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\DispatchOrder;

class Dashboard extends Component
{

    public $awaitingDispatchOrders;
    public $inProcessDispatchOrders;

    public $dispatch_id;
    public DispatchOrder $dispatchOrder;

    public function acceptDispatchOrder ()
    {
        return redirect()->route("dispatch-verify", $this->dispatch_id);
    }

    #[On("update-dispatch-id")]
    public function updateDispatch (string $id) : void 
    {
        $this->dispatchOrder = DispatchOrder::find($id);
    }
    
    public function mount () : void 
    {
        $user = \Auth::user();

        if( $user->can('acceptOrders', DispatchOrder::class) )
        {
            $this->awaitingDispatchOrders = $user->getAwatingDispatchOrders();
            $this->inProcessDispatchOrders = $user->getInProcessDispatchOrders();
        }
    } 

    public function render()
    {
        return view('livewire.dashboard');
    }
}
