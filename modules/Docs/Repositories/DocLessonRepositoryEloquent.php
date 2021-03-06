<?php

namespace Docs\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Docs\Models\DocLesson;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DocLessonRepositoryEloquent extends BaseRepository implements DocLessonRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocLesson::class;
    }

    public function myPaginate($input)
    {
        isset($input[PER_PAGE]) ?: $input[PER_PAGE] = 10;
        return $this->makeModel()
            ->filter($input)
            ->relation(['relations' => ['subCategory:id,name', 'creator:id,email', 'updater:id,email']])
            ->paginate($input[PER_PAGE]);

    }

    public function store($input)
    {
        $input[CREATED_BY_COL] = auth()->id();
        $this->create($input);
    }

    public function change($input, $data)
    {
        $input[UPDATED_BY_COL] = auth()->id();
        $this->update($input, $data->id);
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        $this->importing($path);
    }

//    private function standardized($input, $data)
//    {
//        $input = $data->uploads($input);
//        return $data->checkbox($input);
//    }

    public function destroy($data)
    {
        // TODO: Implement remove() method.
    }

    public function edit($id)
    {
        $docLesson = $this->find($id);
        if(empty($docLesson)) {
            return $docLesson;
        }
        $category = $docLesson->subCategory->category;
        $category_id = $category->id;
        $subCategoryList = $category->subCategories->pluck('name', 'id')->toArray();
        return compact('docLesson', 'category_id', 'subCategoryList');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
