<?php

namespace ACL\Repositories;

use App\Constants\Page;
use Istruct\MultiInheritance\RepositoriesTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\User;


/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function myPaginate($input)
    {
        isset($input[Page::PER_PAGE]) ? : $input[Page::PER_PAGE] = 10;
        return $this->makeModel()
            ->filter($input)
            ->with('roles')
            ->paginate($input[Page::PER_PAGE]);
    }
    public function store($input)
    {
        $input = $this->standardized($input, $this->makeModel());
        return $this->create($input);
    }

    public function change($input, $data)
    {
        $input = $this->standardized($input, $data);
        return $this->update($input, $data->id);
    }
    public function destroy($data)
    {
        // TODO: Implement destroy() method.
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
        return $input;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function searchField($tern = '', $fieldAplyCondition = [], $returnField = ['*'], $paginate = 0)
    {
        $dataModel = $this->model;
        if (empty($fieldAplyCondition)){
            $fieldAplyCondition = $this->model->fillable;
        }
        if (!empty($tern))
        {
            foreach($fieldAplyCondition as $field)
            {
                $dataModel = $dataModel->orWhere($field, 'LIKE', '%' . $tern . '%');
            }
        }
        
        if (!empty($returnField))
        {
            $returnField = ['*'];
        }
        if (!empty($paginate))
        {
            return $dataModel->paginate($paginate, $returnField);
        }

        return $dataModel->get($returnField);
    }

    public function getListByRole($name = [TESTER], $field = 'name')
    {
        return $this->model->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
            ->whereIn('roles.name', $name)
            ->pluck('users.' . $field, 'users.id');
    }
}
