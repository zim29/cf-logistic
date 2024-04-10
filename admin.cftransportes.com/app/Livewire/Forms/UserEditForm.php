<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserEditForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $name;

    #[Validate('required|min:3|max:255|email')]
    public $email;

    #[Validate('required')]
    public $role_id='';

    #[Validate('required|boolean')]
    public $status;
}
