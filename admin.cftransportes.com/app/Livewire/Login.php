<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Auth;

use App\Livewire\Forms\LoginForm;

class Login extends Component
{   
    public LoginForm $form;

    #[Layout('components.layouts.guest')]
    public function render()
    {
        return view('livewire.login');
    }
    

    public function login( )
    {
        $this->form->validate();
        $credentials = [
            'email' => $this->form->email,
            'password' => $this->form->password,
        ];

        if (Auth::attempt($credentials, $this->form->remember)) {
            return redirect()->to('/dashboard'); 
        }

        $this->addError('form.email', __('auth.password'));
    }
}
