<?php

namespace App\Policies;

use App\Models\MultiChoice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MultiChoicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function update(User $user, MultiChoice $multi_choices)
    {
        return $user->id === $multi_choices->user_id;
    }

    public function delete($user, $multi_choices)
    {
        return $user->id === $multi_choices->user_id;
    }

    public function create(User $user)
    {
        return true;
    }
}
