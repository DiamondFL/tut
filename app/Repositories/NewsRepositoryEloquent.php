<?php

namespace App\Repositories;

use App\Constants\Page;
use Istruct\MultiInheritance\RepositoriesTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\News;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    use RepositoriesTrait;
    public function model()
    {
        return News::class;
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
        // TODO: Implement remove() method.
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        $this->importing($path);
    }

    private function standardized($input, $data)
    {
        //$input = $data->uploads($input);
        return $data->checkbox($input);
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
