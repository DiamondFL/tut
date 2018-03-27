<?php

namespace App\Policies;

use App\Models\LessonComment;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonCommentPolicy
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

    public function view(User $user, LessonComment $lesson_comments)
    {
        if ($this->permissionRepository->is('view_lesson_comment')) {
            return true;
        }
        return $user->id === $lesson_comments->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_lesson_comment')) {
            return true;
        }
        return false;
    }

    public function update(User $user, LessonComment $lesson_comments)
    {
        if ($this->permissionRepository->is('update_lesson_comment')) {
            return true;
        }
        return $user->id === $lesson_comments->user_id;
    }

    public function delete($user, LessonComment $lesson_comments)
    {
        if ($this->permissionRepository->is('delete_lesson_comment')) {
            return true;
        }
        return $user->id === $lesson_comments->user_id;
    }

}
