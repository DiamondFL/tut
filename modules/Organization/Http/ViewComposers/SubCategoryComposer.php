<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/22/2018
 * Time: 8:02 PM
 */

namespace Organization\Http\ViewComposers;

use Illuminate\View\View;
use \Repositories\SubCategoryRepository;

class SubCategoryComposer
{
    private $repository;
    public function __construct(SubCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->filterList([]);
        $view->with(['subCategoryCompose' => $list]);
    }
}