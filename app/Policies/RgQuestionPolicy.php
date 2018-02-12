<?php

namespace App\Policies;

use App\Models\RgQuestion;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RgQuestionPolicy
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

    public function view(User $user, RgQuestion $rg_questions)
    {
        if ($this->permissionRepository->is('view_rg_question')) {
            return true;
        }
        return $user->id === $rg_questions->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_rg_question')) {
            return true;
        }
        return false;
    }

    public function update(User $user, RgQuestion $rg_questions)
    {
        if ($this->permissionRepository->is('update_rg_question')) {
            return true;
        }
        return $user->id === $rg_questions->user_id;
    }

    public function delete($user, RgQuestion $rg_questions)
    {
        if ($this->permissionRepository->is('delete_rg_question')) {
            return true;
        }
        return $user->id === $rg_questions->user_id;
    }

}
