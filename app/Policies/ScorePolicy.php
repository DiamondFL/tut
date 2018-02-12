<?php

namespace App\Policies;

use App\Models\Score;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScorePolicy
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

    public function view(User $user, Score $scores)
    {
        if ($this->permissionRepository->is('view_score')) {
            return true;
        }
        return $user->id === $scores->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_score')) {
            return true;
        }
        return false;
    }

    public function update(User $user, Score $scores)
    {
        if ($this->permissionRepository->is('update_score')) {
            return true;
        }
        return $user->id === $scores->user_id;
    }

    public function delete($user, Score $scores)
    {
        if ($this->permissionRepository->is('delete_score')) {
            return true;
        }
        return $user->id === $scores->user_id;
    }

}
