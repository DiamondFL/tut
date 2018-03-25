<?php

namespace App\Policies;

use App\Models\MiniTest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MiniTestPolicy
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

    public function view(User $user, MiniTest $mini_tests)
    {
        if ($this->permissionRepository->is('view_mini_test')) {
            return true;
        }
        return $user->id === $mini_tests->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_mini_test')) {
            return true;
        }
        return false;
    }

    public function update(User $user, MiniTest $mini_tests)
    {
        if ($this->permissionRepository->is('update_mini_test')) {
            return true;
        }
        return $user->id === $mini_tests->user_id;
    }

    public function delete($user, MiniTest $mini_tests)
    {
        if ($this->permissionRepository->is('delete_mini_test')) {
            return true;
        }
        return $user->id === $mini_tests->user_id;
    }

}
