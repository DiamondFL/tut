<?php

namespace App\Policies;

use App\Models\RgAnswer;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RgAnswerPolicy
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

    public function view(User $user, RgAnswer $rg_answers)
    {
        if ($this->permissionRepository->is('view_rg_answer')) {
            return true;
        }
        return $user->id === $rg_answers->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_rg_answer')) {
            return true;
        }
        return false;
    }

    public function update(User $user, RgAnswer $rg_answers)
    {
        if ($this->permissionRepository->is('update_rg_answer')) {
            return true;
        }
        return $user->id === $rg_answers->user_id;
    }

    public function delete($user, RgAnswer $rg_answers)
    {
        if ($this->permissionRepository->is('delete_rg_answer')) {
            return true;
        }
        return $user->id === $rg_answers->user_id;
    }

}
