<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/23/18
 * Time: 1:47 PM
 */

namespace Ush\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Repositories\UshCategoryRepository;

class CategoryComposer
{
    private $repository;
    public function __construct(UshCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->filterList();
        $view->with(['categoryCompose' => $list]);
    }
}