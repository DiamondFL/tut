<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 4:23 PM
 */

namespace Ush\Product\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Product\Repositories\UshSpecialtySizeRepository;

class SpecialtySizeComposer
{
    private $repository;
    public function __construct(UshSpecialtySizeRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->makeModel()->pluck(NAME_COL, ID_COL)->toArray();
        $view->with(['specialtySizeCompose' => $list]);
    }
}