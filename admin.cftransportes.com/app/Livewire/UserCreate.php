<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Livewire\Forms\UserCreateForm as Form;
use App\Models\User as Model;
use App\Models\Role;

class UserCreate extends Component
{
    public Form $form;
    public array $roles;

    public function save () : void 
    {
        $data = $this->form->validate();
        $data['password'] = Hash::make($data['password']);

        try {
            DB::beginTransaction();

            $model = Model::create($data);

            if($model)
            {
                $this->form->reset();
                $this->dispatch('success');
                DB::commit();
            }
            
        } catch ( \Exception $e ) {

            $this->dispatch('error');
            $class = get_class($this);
            $errorMessage = $e->getMessage();
            \Log::error("Error in $class. $errorMessage");
        }


    }

    public function mount () : void
    {
        $this->roles = Role::all()->pluck("name","id")->toArray();
    }
    public function render()
    {
        return view('livewire.user-create');
    }
}
