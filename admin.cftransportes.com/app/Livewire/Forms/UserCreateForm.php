<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserCreateForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $name;

    #[Validate('required|min:3|max:255|email|unique:users,email')]
    public $email;

    #[Validate('required|min:3|max:255')]
    public $password;

    #[Validate('required')]
    public $role_id='';
}
