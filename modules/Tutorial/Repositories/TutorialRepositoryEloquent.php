<?php

namespace Tutorial\Repositories;


use Illuminate\Support\Facades\DB;
use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Tutorial\Models\Tutorial;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TutorialRepositoryEloquent extends BaseRepository implements TutorialRepository
{
    use RepositoriesTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tutorial::class;
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
        $model = $this->create($input);
        if (isset($input['section_names'])) {
            $data = [];
            $now = now();
            foreach ($input['section_names'] as $value) {
                array_push($data, [NAME_COL => $value, TUTORIAL_ID_COL => $model->id, CREATED_AT_COL => $now, UPDATED_AT_COL => $now]);
            }
            DB::table('sections')->insert($data);
        }
        return $model;
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

    public function destroy($id)
    {
        $tutorial = $this->withCount('sections')->find($id);
        if (empty($tutorial)) {
            session()->flash('error', 'Tutorial not found ');
        } elseif ($tutorial->sections_count !== 0) {
            session()->flash('error', 'Can\'t destroy, please delete all it\'section');
        } else {
            session()->flash('success', 'delete success');
            $this->delete($id);
        }
        return $tutorial;
    }

    /**
     * Boot up the repository, ping criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
