<?php

namespace App\Policies;

use App\Models\TutorialTest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TutorialTestPolicy
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

    public function view(User $user, TutorialTest $tutorial_tests)
    {
        if ($this->permissionRepository->is('view_tutorial_test')) {
            return true;
        }
        return $user->id === $tutorial_tests->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_tutorial_test')) {
            return true;
        }
        return false;
    }

    public function update(User $user, TutorialTest $tutorial_tests)
    {
        if ($this->permissionRepository->is('update_tutorial_test')) {
            return true;
        }
        return $user->id === $tutorial_tests->user_id;
    }

    public function delete($user, TutorialTest $tutorial_tests)
    {
        if ($this->permissionRepository->is('delete_tutorial_test')) {
            return true;
        }
        return $user->id === $tutorial_tests->user_id;
    }

}
