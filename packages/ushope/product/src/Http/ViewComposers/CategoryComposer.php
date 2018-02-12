<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/23/18
 * Time: 1:47 PM
 */

namespace Ush\Product\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Product\Repositories\UshCategoryRepository;

class CategoryComposer
{
    private $repository;
    public function __construct(UshCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->makeModel()->pluck(NAME_COL, ID_COL)->toArray();
        $view->with(['categoryCompose' => $list]);
    }
}