<?php

namespace App\Policies;

use App\Models\Subject;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectPolicy
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

    public function update(User $user, Subject $subjects)
    {
        return $user->id === $subjects->user_id;
    }

    public function delete($user, $subjects)
    {
        return $user->id === $subjects->user_id;
    }

    public function create(User $user)
    {
        return true;
    }
}
