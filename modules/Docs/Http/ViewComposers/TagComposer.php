<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/4/2018
 * Time: 4:51 PM
 */

namespace Docs\Http\ViewComposers;

use Docs\Repositories\DocTagRepository;
use Illuminate\View\View;

class TagComposer
{
    private $repository;
    public function __construct(DocTagRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view) {
        $list = $this->repository->filterList();
        $view->with('tagCompose', $list);
    }
}