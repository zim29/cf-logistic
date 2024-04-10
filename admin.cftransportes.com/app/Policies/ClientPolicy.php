<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->role_id == 1) return true;
        
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client): bool
    {
        if($user->role_id == 1) return true;
        
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->role_id == 1) return true;
        
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client): bool
    {
        if($user->role_id == 1) return true;
        
        return false;
    }
}