<?php

namespace App\Policies;

use App\Models\SubCategory;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
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

    public function view(User $user, SubCategory $ush_sub_categories)
    {
        if ($this->permissionRepository->is('view_ush_sub_category')) {
            return true;
        }
        return $user->id === $ush_sub_categories->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_ush_sub_category')) {
            return true;
        }
        return false;
    }

    public function update(User $user, SubCategory $ush_sub_categories)
    {
        if ($this->permissionRepository->is('update_ush_sub_category')) {
            return true;
        }
        return $user->id === $ush_sub_categories->user_id;
    }

    public function delete($user, SubCategory $ush_sub_categories)
    {
        if ($this->permissionRepository->is('delete_ush_sub_category')) {
            return true;
        }
        return $user->id === $ush_sub_categories->user_id;
    }

}
