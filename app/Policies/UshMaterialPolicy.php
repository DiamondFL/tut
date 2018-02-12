<?php

namespace App\Policies;

use App\Models\UshMaterial;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UshMaterialPolicy
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

    public function view(User $user, UshMaterial $ush_materials)
    {
        if ($this->permissionRepository->is('view_ush_material')) {
            return true;
        }
        return $user->id === $ush_materials->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_ush_material')) {
            return true;
        }
        return false;
    }

    public function update(User $user, UshMaterial $ush_materials)
    {
        if ($this->permissionRepository->is('update_ush_material')) {
            return true;
        }
        return $user->id === $ush_materials->user_id;
    }

    public function delete($user, UshMaterial $ush_materials)
    {
        if ($this->permissionRepository->is('delete_ush_material')) {
            return true;
        }
        return $user->id === $ush_materials->user_id;
    }

}
