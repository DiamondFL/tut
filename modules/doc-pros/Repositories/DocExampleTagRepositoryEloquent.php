<?php

namespace DocPros\Repositories;

use App\Constants\Page;
use Illuminate\Support\Facades\DB;
use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DocPros\Models\DocExampleTag;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DocExampleTagRepositoryEloquent extends BaseRepository implements DocExampleTagRepository
{
    use RepositoriesTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocExampleTag::class;
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

    public function paginateByTags($input)
    {

    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
