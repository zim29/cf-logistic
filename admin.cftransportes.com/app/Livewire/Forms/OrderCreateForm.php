<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderCreateForm extends Form
{   
    #[Validate('required|array|min:1')]
    public $items = [];

    #[Validate('required')]
    public $client_id = null;

    #[Validate('required')]
    public $pay_method_id = '';

}
