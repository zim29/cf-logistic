<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class WarehouseEditForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name;

    #[Validate('required|boolean')]
    public $status;
}
