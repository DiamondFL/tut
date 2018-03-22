<?php

namespace Ush\Repositories;


use Istruct\MultiInheritance\RepositoriesTrait;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Ush\Models\UshCategory;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UshCategoryRepositoryEloquent extends BaseRepository implements UshCategoryRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UshCategory::class;
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
        $model =$this->create($input);
        if(request()->has('sub_category_names')) {
            $data = [];
            $now = now();
            foreach (request()->get('sub_category_names') as $value) {
                array_push($data, ['name' => $value, 'ush_category_id' => $model->id, 'created_at' => $now, 'updated_at' => $now] );
            }
            DB::table('ush_sub_categories')->insert($data);
        }
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
