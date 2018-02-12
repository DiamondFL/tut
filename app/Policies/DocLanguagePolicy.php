<?php

namespace App\Policies;

use App\Models\DocLanguage;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocLanguagePolicy
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

    public function view(User $user, DocLanguage $doc_languages)
    {
        if ($this->permissionRepository->is('view_doc_language')) {
            return true;
        }
        return $user->id === $doc_languages->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_doc_language')) {
            return true;
        }
        return false;
    }

    public function update(User $user, DocLanguage $doc_languages)
    {
        if ($this->permissionRepository->is('update_doc_language')) {
            return true;
        }
        return $user->id === $doc_languages->user_id;
    }

    public function delete($user, DocLanguage $doc_languages)
    {
        if ($this->permissionRepository->is('delete_doc_language')) {
            return true;
        }
        return $user->id === $doc_languages->user_id;
    }

}
