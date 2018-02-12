<?php

namespace App\Policies;

use App\Models\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
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

    public function update(User $user, Question $questions)
    {
        return $user->id === $questions->user_id;
    }

    public function delete($user, $questions)
    {
        return $user->id === $questions->user_id;
    }

    public function create(User $user)
    {
        return true;
    }
}
