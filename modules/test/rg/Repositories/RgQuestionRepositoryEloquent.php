<?php

namespace Test\Rg\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Test\Rg\Models\RgQuestion;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RgQuestionRepositoryEloquent extends BaseRepository implements RgQuestionRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RgQuestion::class;
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
        $input = $this->standardized($input, $this->makeModel());
        $this->create($input);
    }

    public function change($input, $data)
    {
        $input = $this->standardized($input, $data);
        $this->update($input, $data->id);
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

    public function destroy($data)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
