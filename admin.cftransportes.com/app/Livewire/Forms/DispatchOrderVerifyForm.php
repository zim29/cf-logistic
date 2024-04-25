<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DispatchOrderVerifyForm extends Form
{
    #[Validate('required|array|min:1')]
    public $items = [];

    #[Validate('required|boolean')]
    public $destiny = false;

    #[Validate('required_unless:destiny,true')]
    public $warehouse_id = '';
}
