<?php

namespace App\Policies;

use App\Models\LessonFeedBack;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonFeedBackPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    private $roleRepository, $permissionRepository;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function view(User $user, LessonFeedBack $lesson_feed_backs)
    {
        if ($this->permissionRepository->is('view_lesson_feed_back')) {
            return true;
        }
        return $user->id === $lesson_feed_backs->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_lesson_feed_back')) {
            return true;
        }
        return false;
    }

    public function update(User $user, LessonFeedBack $lesson_feed_backs)
    {
        if ($this->permissionRepository->is('update_lesson_feed_back')) {
            return true;
        }
        return $user->id === $lesson_feed_backs->user_id;
    }

    public function delete($user, LessonFeedBack $lesson_feed_backs)
    {
        if ($this->permissionRepository->is('delete_lesson_feed_back')) {
            return true;
        }
        return $user->id === $lesson_feed_backs->user_id;
    }

}
