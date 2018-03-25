<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
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

    public function view(User $user, Lesson $lessons)
    {
        if ($this->permissionRepository->is('view_lesson')) {
            return true;
        }
        return $user->id === $lessons->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_lesson')) {
            return true;
        }
        return false;
    }

    public function update(User $user, Lesson $lessons)
    {
        if ($this->permissionRepository->is('update_lesson')) {
            return true;
        }
        return $user->id === $lessons->user_id;
    }

    public function delete($user, Lesson $lessons)
    {
        if ($this->permissionRepository->is('delete_lesson')) {
            return true;
        }
        return $user->id === $lessons->user_id;
    }

}
