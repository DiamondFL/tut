<?php

namespace App\Policies;

use App\Models\SocialFacebookAccount;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialFacebookAccountPolicy
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

    public function view(User $user, SocialFacebookAccount $social_facebook_accounts)
    {
        if ($this->permissionRepository->is('view_social_facebook_account')) {
            return true;
        }
        return $user->id === $social_facebook_accounts->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_social_facebook_account')) {
            return true;
        }
        return false;
    }

    public function update(User $user, SocialFacebookAccount $social_facebook_accounts)
    {
        if ($this->permissionRepository->is('update_social_facebook_account')) {
            return true;
        }
        return $user->id === $social_facebook_accounts->user_id;
    }

    public function delete($user, SocialFacebookAccount $social_facebook_accounts)
    {
        if ($this->permissionRepository->is('delete_social_facebook_account')) {
            return true;
        }
        return $user->id === $social_facebook_accounts->user_id;
    }

}
