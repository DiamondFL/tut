<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/30/18
 * Time: 3:16 PM
 */

namespace Organization\Observers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Models\Category;

class CategoryObserver
{
    public function __construct()
    {

    }

    public function created(Category $model)
    {

    }
    public function creating(Category $model)
    {

    }
    public function updated(Category $model)
    {

    }
    public function updating(Category $model)
    {

    }
    public function deleting(Category $model)
    {

    }
    public function deleted(Category $model)
    {

    }
    public function saving(Category $model)
    {

    }
    public function saved(Category $model)
    {
        if(request()->has('sub_category_names')) {
            $data = [];
            foreach (request()->get('sub_category_names') as $value) {
                array_p($data, ['name' => $value, 'category_id' => $model->id]);
            }
            DB::table('sub_categories')->insert($data);
        }
    }
}