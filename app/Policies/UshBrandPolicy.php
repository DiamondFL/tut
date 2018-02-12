<?php

namespace App\Policies;

use App\Models\UshBrand;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UshBrandPolicy
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

    public function view(User $user, UshBrand $ush_brands)
    {
        if ($this->permissionRepository->is('view_ush_brand')) {
            return true;
        }
        return $user->id === $ush_brands->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_ush_brand')) {
            return true;
        }
        return false;
    }

    public function update(User $user, UshBrand $ush_brands)
    {
        if ($this->permissionRepository->is('update_ush_brand')) {
            return true;
        }
        return $user->id === $ush_brands->user_id;
    }

    public function delete($user, UshBrand $ush_brands)
    {
        if ($this->permissionRepository->is('delete_ush_brand')) {
            return true;
        }
        return $user->id === $ush_brands->user_id;
    }

}
