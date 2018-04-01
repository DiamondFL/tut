<?php

namespace Tutorial\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Tutorial\Models\LessonTest;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LessonTestRepositoryEloquent extends BaseRepository implements LessonTestRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LessonTest::class;
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
        $lessonTest = $this
            ->with(['lesson:id,section_id', 'lesson.section:id,tutorial_id', 'lesson.section.tutorial:id'])
            ->find($id);
        if(empty($lessonTest)) {
            return $lessonTest;
        }
        $tutorial_id = $lessonTest->lesson->section->tutorial->id;
        $section_id = $lessonTest->lesson->section->id;
        $lessonList = $lessonTest->lesson->section->lessons()->pluck('title', 'id')->toArray();
        $sectionList = $lessonTest->lesson->section->tutorial->sections()->pluck('name', 'id')->toArray();
        $replies = [1 => REPLY1_COL, 2 => REPLY2_COL, 3=> REPLY3_COL, 4=> REPLY4_COL];
        return compact('lessonTest', 'lessonList', 'sectionList', 'tutorial_id', 'section_id', 'replies');
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
