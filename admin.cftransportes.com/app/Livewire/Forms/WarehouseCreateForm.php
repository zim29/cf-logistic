<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class WarehouseCreateForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $name;
}
