<?php

namespace _namespace_\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use _namespace_\Models\_class_;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class _class_RepositoryEloquent extends BaseRepository implements _class_Repository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return _class_::class;
    }

    public function myPaginate($input)
    {
        isset($input[PER_PAGE]) ?: $input[PER_PAGE] = 10;
        return $this->makeModel()
            ->filter($input)
            ->paginate($input[PER_PAGE]);

    }

    public function store($input)
    {
        $input[CREATED_BY_COL] = auth()->user()->id;
        $input = $this->standardized($input, $this->makeModel());
        return $this->create($input);
    }

    public function edit($id)
    {
        $_class_ = $this->find($id);
        if(empty($_class_))
        {
            return $_class_;
        }
        return compact('_class_');
    }

    public function change($input, $data)
    {
        $input[UPDATED_BY_COL] = auth()->user()->id;
        $input = $this->standardized($input, $data);
        return $this->update($input, $data->id);
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        return $this->importing($path);
    }

    private function standardized($input, $data)
    {
        $input = $data->uploads($input);
        return $data->checkbox($input);
    }

    public function destroy($data)
    {
        return $this->delete($data->id);
    }

    /**
     * Boot up the repository, ping criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
