<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Alert extends Component
{   
    public $message;
    public $icon;
    public $color;

    #[On('success')]
    public function success () : void 
    {
        $this->message = __('Solicitud procesada exitósamente');
        $this->icon = 'bi-check-circle-fill';
        $this->color = 'success';

        $this->dispatch('show-modal')->self();
    }

    #[On('error')]
    public function error () : void 
    {
        $this->message = __('Ha ocurrido un error al procesar su solicitud');
        $this->icon = 'bi-exclamation-circle-fill';
        $this->color = 'danger';

        $this->dispatch('show-modal')->self();
    }


    public function render()
    {
        return view('livewire.alert');
    }
}
