<?php

namespace IoAccess\Repositories;

use App\Constants\Page;
use App\Models\Permission;
use App\Models\Role;
use Istruct\MultiInheritance\RepositoriesTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    use RepositoriesTrait;

    public function model()
    {
        return Permission::class;
    }

    public function myPaginate($input)
    {
        isset($input[Page::PER_PAGE]) ?: $input[Page::PER_PAGE] = 10;
        return $this->makeModel()
            ->filter($input)
            ->paginate($input[Page::PER_PAGE]);
    }

    public function store($input)
    {
        // TODO: Implement store() method.
    }

    public function change($input, $data)
    {
        return $this->update($input, $data->id);
    }

    public function destroy($data)
    {
        // TODO: Implement remove() method.
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        $this->importing($path);
    }

    public function is($name)
    {
        $name = explode('|', $name);
        return Cache::remember($name, 999, function () use ($name) {
            $permissionIds = $this->makeModel()
                ->whereIn('name', $name)
                ->where('is_active', 1)
                ->pluck('id')
                ->toArray();
            if (count($permissionIds) > 0) {
                $roleIds = DB::table('role_permission')
                    ->whereIn('permission_id', $permissionIds)
                    ->pluck('role_id')
                    ->toArray();
                if (count($roleIds)) {
                    $role_user = DB::table('role_user')
                        ->where('user_id', auth()->id())
                        ->whereIn('role_id', $roleIds)
                        ->count();
                    if ($role_user > 0) {
                        return true;
                    }
                }
            }
            return false;
        });
    }

    public function access($module_id, $access_id)
    {
        $permission = $this->onlyOne(['module_id'=> $module_id, 'access_id' => $access_id]);
        if(!empty($permission))
        {
            $role_ids = DB::table('role_permission')
                ->where('permission_id', $permission->id)
                ->pluck('role_id');
            if (count($role_ids) > 0) {
                $count = DB::table('role_user')
                    ->where('user_id', auth()->id())
                    ->whereIn('role_id', $role_ids)
                    ->count();
                if ($count > 0) {
                    return true;
                }
            }
        }
        return false;
    }

    public function accesses($module_id, $access_ids)
    {
        $accesses = [];
        foreach ($access_ids as $access_id)
        {
            $accesses[$access_id] = $this->access($module_id, $access_id);
        }
        return $accesses;
    }

    public function changeLevel($module_id, $level_id, $role_id)
    {
        $accessIds = ACCESS_LEVEL[$level_id];
        $permission_ids = $this->filterOneList(['module_id' => $module_id, 'access_ids' => $accessIds]);
        return app(Role::class)->find($role_id)->permission()->sync($permission_ids);
    }

    /**
     * Boot up the repository, pushing criteria
     */

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
