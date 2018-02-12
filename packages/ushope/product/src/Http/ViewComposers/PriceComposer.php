<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 4:22 PM
 */

namespace Ush\Product\Http\ViewComposers;


use Illuminate\View\View;
use Ush\Product\Repositories\UshPriceRepository;

class PriceComposer
{
    private $repository;
    public function __construct(UshPriceRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->makeModel()->pluck(NAME_COL, ID_COL)->toArray();
        $view->with(['priceCompose' => $list]);
    }
}