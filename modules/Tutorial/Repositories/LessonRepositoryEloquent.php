<?php

namespace Tutorial\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Tutorial\Models\Lesson;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LessonRepositoryEloquent extends BaseRepository implements LessonRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Lesson::class;
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
        $this->create($input);
    }

    public function edit($id)
    {
        $lesson = $this->find($id);
        if(empty($lesson)) {
            return $lesson;
        }
        $tutorial = $lesson->section->tutorial;
        $tutorial_id = $tutorial->id;
        $sectionList = $tutorial->sections->pluck('name', 'id')->toArray();
        return compact('lesson', 'tutorial_id', 'sectionList');
    }

    public function change($input, $data)
    {
        $input[UPDATED_BY_COL] = auth()->user()->id;
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
        $this->delete($data->id);
    }

    /**
     * Boot up the repository, ping criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
