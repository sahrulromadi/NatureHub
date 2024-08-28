<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Auth\Access\Response;
use Illuminate\Container\Attributes\Auth;

class CampaignPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Campaign $campaign): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Campaign $campaign): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Campaign $campaign): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Campaign $campaign): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Campaign $campaign): bool
    {
        $user = Auth::user();
        return $user && $user->can('manage campaigns');
    }
}
