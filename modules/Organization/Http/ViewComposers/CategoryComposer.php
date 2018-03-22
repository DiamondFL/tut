<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/23/18
 * Time: 1:47 PM
 */

namespace Organization\Http\ViewComposers;

use Illuminate\View\View;
use Organization\Repositories\CategoryRepository;

class CategoryComposer
{
    private $repository;
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->filterList();
        $view->with(['categoryCompose' => $list]);
    }
}