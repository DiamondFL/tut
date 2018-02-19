<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/30/18
 * Time: 3:16 PM
 */

namespace Ush\Observers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ush\Models\UshCategory;

class CategoryObserver
{
    public function __construct()
    {

    }

    public function created(UshCategory $model)
    {

    }
    public function creating(UshCategory $model)
    {

    }
    public function updated(UshCategory $model)
    {

    }
    public function updating(UshCategory $model)
    {

    }
    public function deleting(UshCategory $model)
    {

    }
    public function deleted(UshCategory $model)
    {

    }
    public function saving(UshCategory $model)
    {

    }
    public function saved(UshCategory $model)
    {
        if(request()->has('sub_category_names')) {
            $data = [];
            foreach (request()->get('sub_category_names') as $value) {
                array_push($data, ['name' => $value, 'ush_category_id' => $model->id]);
            }
            DB::table('ush_sub_categories')->insert($data);
        }
    }
}