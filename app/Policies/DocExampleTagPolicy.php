<?php

namespace App\Policies;

use App\Models\DocExampleTag;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocExampleTagPolicy
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

    public function view(User $user, DocExampleTag $doc_example_tags)
    {
        if ($this->permissionRepository->is('view_doc_example_tag')) {
            return true;
        }
        return $user->id === $doc_example_tags->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_doc_example_tag')) {
            return true;
        }
        return false;
    }

    public function update(User $user, DocExampleTag $doc_example_tags)
    {
        if ($this->permissionRepository->is('update_doc_example_tag')) {
            return true;
        }
        return $user->id === $doc_example_tags->user_id;
    }

    public function delete($user, DocExampleTag $doc_example_tags)
    {
        if ($this->permissionRepository->is('delete_doc_example_tag')) {
            return true;
        }
        return $user->id === $doc_example_tags->user_id;
    }

}
