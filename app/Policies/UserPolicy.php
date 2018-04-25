<?php

namespace App\Policies;

use App\Models\User;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function view(User $user, User $users)
    {
        if ($this->permissionRepository->is('view_user')) {
            return true;
        }
        return $user->id === $users->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_user')) {
            return true;
        }
        return false;
    }

    public function update(User $user, User $users)
    {
        if ($this->permissionRepository->is('update_user')) {
            return true;
        }
        return $user->id === $users->user_id;
    }

    public function delete($user, User $users)
    {
        if ($this->permissionRepository->is('delete_user')) {
            return true;
        }
        return $user->id === $users->user_id;
    }

}
