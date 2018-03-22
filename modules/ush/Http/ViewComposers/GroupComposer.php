<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 4:09 PM
 */

namespace Ush\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Repositories\UshGroupRepository;

class GroupComposer
{
    private $repository;

    public function __construct(UshGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function compose(View $view)
    {
        $list = $this->repository->makeModel()->pluck(NAME_COL, ID_COL)->toArray();
        $view->with(['groupCompose' => $list]);
    }
}