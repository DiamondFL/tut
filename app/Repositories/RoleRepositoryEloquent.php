<?php

namespace App\Repositories;

use Istruct\MultiInheritance\RepositoriesTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Role;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    use RepositoriesTrait;
    protected $checkbox = ['is_is_active'];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    public function myPaginate($input)
    {
        return $this->paginate(10);
    }

    public function store($input)
    {
        $input = $this->checkbox($input);
        $this->create($input);
    }

    public function change($input, $id)
    {
        $this->update($input, $id);
    }

    public function destroy($input)
    {
        $this->delete($input);
    }

    public function destroys($input)
    {
        $this->findWhereIn('id', $input)->delete();
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        $this->importing($path);
    }

    private function standardized($input, $data)
    {
        $input = $data->uploads($input);
        return $data->checkbox($input);
    }

    public function is($name)
    {
//        return Cache::remember($name, 999, function () use ($name) {
            $user_id = auth()->id();
            $role = $this->makeModel()->where('name', $name)->where('is_active', 1)->first();
            if (empty($role)) {
                return false;
            }
            $count = DB::table('role_user')->where('user_id', $user_id)->where('role_id', $role->id)->count();
            if ($count > 0) {
                return true;
            }
            return false;
//        });
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
