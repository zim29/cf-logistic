<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VehicleEditForm extends Form
{
    #[Validate('required')]
    public $placard = null;

    #[Validate('nullable')]
    public $driver_id = null;

    #[Validate('required|boolean')]
    public $status;
}
