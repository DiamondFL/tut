<?php

namespace App\Policies;

use App\Models\DocProject;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocProjectPolicy
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

    public function view(User $user, DocProject $doc_projects)
    {
        if ($this->permissionRepository->is('view_doc_project')) {
            return true;
        }
        return $user->id === $doc_projects->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_doc_project')) {
            return true;
        }
        return false;
    }

    public function update(User $user, DocProject $doc_projects)
    {
        if ($this->permissionRepository->is('update_doc_project')) {
            return true;
        }
        return $user->id === $doc_projects->user_id;
    }

    public function delete($user, DocProject $doc_projects)
    {
        if ($this->permissionRepository->is('delete_doc_project')) {
            return true;
        }
        return $user->id === $doc_projects->user_id;
    }

}
