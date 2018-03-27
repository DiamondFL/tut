<?php

namespace App\Policies;

use App\Models\LessonResult;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonResultPolicy
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

    public function view(User $user, LessonResult $lesson_results)
    {
        if ($this->permissionRepository->is('view_lesson_result')) {
            return true;
        }
        return $user->id === $lesson_results->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_lesson_result')) {
            return true;
        }
        return false;
    }

    public function update(User $user, LessonResult $lesson_results)
    {
        if ($this->permissionRepository->is('update_lesson_result')) {
            return true;
        }
        return $user->id === $lesson_results->user_id;
    }

    public function delete($user, LessonResult $lesson_results)
    {
        if ($this->permissionRepository->is('delete_lesson_result')) {
            return true;
        }
        return $user->id === $lesson_results->user_id;
    }

}
