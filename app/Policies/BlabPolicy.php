<?php

namespace App\Policies;

use App\Models\Blab;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlabPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blab $blab): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blab $blab): bool
    {
        return $blab->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blab $blab): bool
    {
        return $this->update($user, $blab);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blab $blab): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blab $blab): bool
    {
        //
    }
}
