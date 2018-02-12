<?php

namespace App\Policies;

use App\Models\RgReply;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RgReplyPolicy
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

    public function view(User $user, RgReply $rg_replies)
    {
        if ($this->permissionRepository->is('view_rg_reply')) {
            return true;
        }
        return $user->id === $rg_replies->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_rg_reply')) {
            return true;
        }
        return false;
    }

    public function update(User $user, RgReply $rg_replies)
    {
        if ($this->permissionRepository->is('update_rg_reply')) {
            return true;
        }
        return $user->id === $rg_replies->user_id;
    }

    public function delete($user, RgReply $rg_replies)
    {
        if ($this->permissionRepository->is('delete_rg_reply')) {
            return true;
        }
        return $user->id === $rg_replies->user_id;
    }

}
