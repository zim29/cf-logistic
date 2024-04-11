<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VehicleCreateForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $placard;

    #[Validate('required|exists:vehicle_types,id')]
    public $vehicle_type_id='';

}
