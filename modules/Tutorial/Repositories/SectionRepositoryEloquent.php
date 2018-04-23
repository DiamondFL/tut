<?php

namespace Tutorial\Repositories;


use Illuminate\Support\Facades\DB;
use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Tutorial\Models\Section;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SectionRepositoryEloquent extends BaseRepository implements SectionRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Section::class;
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
        return $this->create($input);
    }

    public function edit($id) {
        $section = $this->find($id);
        if(empty($section))
        {
            return $section;
        }
        $lessons = $section->lessons()
            ->orderBy(NO_COL, 'ASC')
            ->pluck(TITLE_COL, ID_COL)->toArray();
        return compact('section', 'lessons');
    }

    public function change($input, $data)
    {
        $input = $this->standardized($input, $data);
        foreach ($input['lesson_ids'] as $k => $lesson_id)
        {
            DB::table(LESSONS_TB)->where('id', $lesson_id)->update([NO_COL => $k]);
        }
        return $this->update($input, $data->id);
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

    public function destroy($id)
    {
        $section = $this->withCount('lessons')
            ->find($id, [ID_COL, LESSON_ID_COL]);
        if(empty($section)) {
            session()->flash('error', 'Not Found');
            return false;
        }
        if($section->lessons_count > 0)
        {
            session()->flash('error', 'Have lessons, please remove before');
            return false;
        }
        session()->flash('success', 'Delete success');
        return $this->delete($id);
    }

    /**
     * Boot up the repository, ping criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
