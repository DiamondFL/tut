<?php

namespace App\Policies;

use App\Models\UshWeight;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UshWeightPolicy
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

    public function view(User $user, UshWeight $ush_weights)
    {
        if ($this->permissionRepository->is('view_ush_weight')) {
            return true;
        }
        return $user->id === $ush_weights->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_ush_weight')) {
            return true;
        }
        return false;
    }

    public function update(User $user, UshWeight $ush_weights)
    {
        if ($this->permissionRepository->is('update_ush_weight')) {
            return true;
        }
        return $user->id === $ush_weights->user_id;
    }

    public function delete($user, UshWeight $ush_weights)
    {
        if ($this->permissionRepository->is('delete_ush_weight')) {
            return true;
        }
        return $user->id === $ush_weights->user_id;
    }

}
