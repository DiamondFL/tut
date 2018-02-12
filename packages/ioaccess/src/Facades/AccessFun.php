<?php
/**
 * Created by PhpStorm.
 * User: np
 * Date: 10/25/17
 * Time: 3:27 PM
 */

namespace IoAccess\Facades;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;

class AccessFun
{
    private $repository, $roleRepository;

    public function __construct(PermissionRepository $repository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    public function access($moduleId, $accessId)
    {
        return $this->repository->access($moduleId, $accessId);
    }

    public function accesses($moduleId, $accessIds)
    {
        return $this->repository->accesses($moduleId, $accessIds);
    }

    public function isRole($name)
    {
        return $this->roleRepository->is($name);
    }
}