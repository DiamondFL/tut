<?php

namespace App\Policies;

use App\Models\DocNewsTag;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocNewsTagPolicy
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

    public function view(User $user, DocNewsTag $doc_news_tags)
    {
        if ($this->permissionRepository->is('view_doc_news_tag')) {
            return true;
        }
        return $user->id === $doc_news_tags->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_doc_news_tag')) {
            return true;
        }
        return false;
    }

    public function update(User $user, DocNewsTag $doc_news_tags)
    {
        if ($this->permissionRepository->is('update_doc_news_tag')) {
            return true;
        }
        return $user->id === $doc_news_tags->user_id;
    }

    public function delete($user, DocNewsTag $doc_news_tags)
    {
        if ($this->permissionRepository->is('delete_doc_news_tag')) {
            return true;
        }
        return $user->id === $doc_news_tags->user_id;
    }

}
