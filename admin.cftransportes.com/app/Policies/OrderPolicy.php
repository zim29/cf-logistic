<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3 ) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->role_id == 1 || $user->role_id == 3 ) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Order $order): bool
    {
        if( $user->role_id == 1 || $user->role_id == 2 ) return true;

        return false;
    }

    /**
     * Determine whether the user can approve the model.
     */
    public function approve(User $user, Order $order): bool
    {
        if( $user->role_id == 1 || $user->role_id == 2 ) return true;

        return false;
    }
    
}
