<?php
namespace App\Policies;
use App\Models\SystemExample;
use App\Models\User;
class SystemExamplePolicy {
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SystemExample $systemExample): bool {
        return true;
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return $user->is_admin;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SystemExample $systemExample): bool {
        return $user->is_admin;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SystemExample $systemExample): bool {
        return $user->is_admin;
    }
}
