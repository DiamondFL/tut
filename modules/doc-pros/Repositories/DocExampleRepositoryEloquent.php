<?php

namespace DocPros\Repositories;

use App\Constants\Page;
use App\Models\Tag;
use Istruct\MultiInheritance\RepositoriesTrait;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use DocPros\Models\DocExample;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DocExampleRepositoryEloquent extends BaseRepository implements DocExampleRepository
{
    use RepositoriesTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocExample::class;
    }

    public function myPaginate($input)
    {
        isset($input[Page::PER_PAGE]) ?: $input[Page::PER_PAGE] = 10;
        return$this->model
            ->filter($input)
            ->paginate($input[Page::PER_PAGE]);
    }

    public function paginateByTags($input)
    {
        if(isset($input[TAG_ID_COL])) {
            return $this->model
                ->join(DOC_EXAMPLE_TAGS_TB, DOC_EXAMPLES_TB . '.' . DOC_EXAMPLE_ID_COL, '=', DOC_EXAMPLE_TAGS_TB . '.' . DOC_EXAMPLE_ID_COL)
                ->where(DOC_EXAMPLE_TAGS_TB . '.' . TAG_ID_COL, $input[TAG_ID_COL])
                ->filter($input)
                ->paginate();
        }
        return $this->myPaginate($input);
    }

    public function store($input)
    {
        $input = $this->standardized($input,$this->model);
        $input[CREATED_BY_COL] = auth()->id();
        $data = $this->create($input);
        if (isset($input[TAGS_TB])) {
            $this->tags($input[TAGS_TB], $data);
        }
    }

    public function change($input, $data)
    {
        $input = $this->standardized($input, $data);
        $input[UPDATED_BY_COL] = auth()->id();
        $data = $this->update($input, $data->id);
        if (isset($input[TAGS_TB])) {
            $this->tags($input[TAGS_TB], $data);
        }
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path =$this->model->uploadImport($file);
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
