<?php

namespace App\Policies;

use App\Models\DispatchOrder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DispatchOrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $user->role_id == 1 || $user->role_id == 4 ) return true;

        return false;
    }


    public function acceptOrders(User $user): bool
    {
        if( $user->role_id == 5 ) return true;

        return false;
    }

    public function accept(User $user, DispatchOrder $dispatchOrder): bool
    {
        if( $dispatchOrder->driver_id == $user->id )  return true;

        return false;
    }
}
