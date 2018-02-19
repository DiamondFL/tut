<?php

namespace App\Policies;

use App\Models\DocLesson;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocLessonPolicy
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

    public function view(User $user, DocLesson $doc_lessons)
    {
        if ($this->permissionRepository->is('view_doc_lesson')) {
            return true;
        }
        return $user->id === $doc_lessons->user_id;
    }

    public function create(User $user)
    {
        if ($this->permissionRepository->is('create_doc_lesson')) {
            return true;
        }
        return false;
    }

    public function update(User $user, DocLesson $doc_lessons)
    {
        if ($this->permissionRepository->is('update_doc_lesson')) {
            return true;
        }
        return $user->id === $doc_lessons->user_id;
    }

    public function delete($user, DocLesson $doc_lessons)
    {
        if ($this->permissionRepository->is('delete_doc_lesson')) {
            return true;
        }
        return $user->id === $doc_lessons->user_id;
    }

}
