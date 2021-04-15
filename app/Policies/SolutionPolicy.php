<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolutionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return mixed
     */
    public function view(User $user, Solution $solution)
    {
        return $this->hasAccess($user, $solution);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return mixed
     */
    public function update(User $user, Solution $solution)
    {
        return $this->hasAccess($user, $solution);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return mixed
     */
    public function delete(User $user, Solution $solution)
    {
        return $this->hasAccess($user, $solution);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return mixed
     */
    public function restore(User $user, Solution $solution)
    {
        return $this->hasAccess($user, $solution);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return mixed
     */
    public function forceDelete(User $user, Solution $solution)
    {
        return $this->hasAccess($user, $solution);
    }

    private function hasAccess(User $user, Solution $solution)
    {
        return true;
    }
}
