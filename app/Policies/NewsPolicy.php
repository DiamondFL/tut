<?php

namespace App\Policies;

use App\Models\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
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

    public function update(User $user, News $news)
    {
        dump($news);
        return $user->id === $news->user_id;
    }

    public function delete($user, $news)
    {
        return $user->id === $news->user_id;
    }

    public function create(User $user)
    {
        return $user->role->where('name', 'admin')->count();
    }
}
