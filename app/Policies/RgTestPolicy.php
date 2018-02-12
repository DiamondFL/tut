<?php

namespace App\Policies;

use App\Models\RgTest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RgTestPolicy
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

    public function view(User $user, RgTest $rg_tests)
    {
        if ($this->permissionRepository->is('view_rg_test')) {
            return true;
        }
        return $user->id === $rg_tests->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_rg_test')) {
            return true;
        }
        return false;
    }

    public function update(User $user, RgTest $rg_tests)
    {
        if ($this->permissionRepository->is('update_rg_test')) {
            return true;
        }
        return $user->id === $rg_tests->user_id;
    }

    public function delete($user, RgTest $rg_tests)
    {
        if ($this->permissionRepository->is('delete_rg_test')) {
            return true;
        }
        return $user->id === $rg_tests->user_id;
    }

}
