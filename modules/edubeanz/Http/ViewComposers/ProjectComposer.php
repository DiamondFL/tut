<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/14/2018
 * Time: 9:23 PM
 */

namespace Edubeanz\Http\ViewComposers;
use DocPros\Repositories\DocProjectRepository;
use Illuminate\View\View;

class ProjectComposer
{
    private $repository;
    public function __construct(DocProjectRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view)
    {
        $list = $this->repository->lists();
        $view->with('projectCompose', $list);
    }
}