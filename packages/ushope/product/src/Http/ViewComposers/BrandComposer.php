<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 4:08 PM
 */

namespace Ush\Product\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Product\Repositories\UshBrandRepository;

class BrandComposer
{
    private $repository;
    public function __construct(UshBrandRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->makeModel()->pluck(NAME_COL, ID_COL)->toArray();
        $view->with(['brandCompose' => $list]);
    }
}