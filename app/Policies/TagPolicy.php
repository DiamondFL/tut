<?php

namespace App\Policies;

use App\Models\Tag;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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

    public function update(User $user, Tag $tags)
    {
        return $user->id === $tags->user_id;
    }

    public function delete($user, $tags)
    {
        return $user->id === $tags->user_id;
    }

    public function create(User $user)
    {
        return true;
    }
}
