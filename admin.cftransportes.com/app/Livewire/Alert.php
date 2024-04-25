<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Alert extends Component
{   
    // Message to be displayed in the alert
    public $message;

    // Icon to be displayed in the alert
    public $icon;

    // Color of the alert (success, danger, etc.)
    public $color;

    /**
     * Success method to be called when a successful action is performed.
     * Sets the message, icon, and color properties accordingly.
     *
     * @param string $message - Optional message to be displayed.
     */
    #[On('success')]
    public function success ($message = '') : void 
    {
        $this->message = __("Solicitud procesada exitósamente \n $message");
        $this->icon = 'bi-check-circle-fill';
        $this->color = 'success';

        $this->dispatch('show-modal')->self();
    }

    /**
     * Error method to be called when an error occurs.
     * Sets the message, icon, and color properties accordingly.
     *
     * @param string $message - Optional message to be displayed.
     */
    #[On('error')]
    public function error ($message = '') : void 
    {
        $this->message = __("Ha ocurrido un error al procesar su solicitud \n $message");
        $this->icon = 'bi-exclamation-circle-fill';
        $this->color = 'danger';

        $this->dispatch('show-modal')->self();
    }

    /**
     * Render method to render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.alert');
    }
}
