<?php
namespace App\Policies;
use App\Models\User;
use App\Models\UserExample;
class UserExamplePolicy {
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserExample $userExample): bool {
        return $user->id === $userExample->user_id;
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return true;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserExample $userExample): bool {
        return $user->id === $userExample->user_id;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserExample $userExample): bool {
        return $user->id === $userExample->user_id;
    }
}
