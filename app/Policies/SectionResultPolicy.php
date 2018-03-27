<?php

namespace App\Policies;

use App\Models\SectionResult;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionResultPolicy
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

    public function view(User $user, SectionResult $section_results)
    {
        if ($this->permissionRepository->is('view_section_result')) {
            return true;
        }
        return $user->id === $section_results->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_section_result')) {
            return true;
        }
        return false;
    }

    public function update(User $user, SectionResult $section_results)
    {
        if ($this->permissionRepository->is('update_section_result')) {
            return true;
        }
        return $user->id === $section_results->user_id;
    }

    public function delete($user, SectionResult $section_results)
    {
        if ($this->permissionRepository->is('delete_section_result')) {
            return true;
        }
        return $user->id === $section_results->user_id;
    }

}
