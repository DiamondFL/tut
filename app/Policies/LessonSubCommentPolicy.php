<?php

namespace App\Policies;

use App\Models\LessonSubComment;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonSubCommentPolicy
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

    public function view(User $user, LessonSubComment $lesson_sub_comments)
    {
        if ($this->permissionRepository->is('view_lesson_sub_comment')) {
            return true;
        }
        return $user->id === $lesson_sub_comments->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_lesson_sub_comment')) {
            return true;
        }
        return false;
    }

    public function update(User $user, LessonSubComment $lesson_sub_comments)
    {
        if ($this->permissionRepository->is('update_lesson_sub_comment')) {
            return true;
        }
        return $user->id === $lesson_sub_comments->user_id;
    }

    public function delete($user, LessonSubComment $lesson_sub_comments)
    {
        if ($this->permissionRepository->is('delete_lesson_sub_comment')) {
            return true;
        }
        return $user->id === $lesson_sub_comments->user_id;
    }

}
