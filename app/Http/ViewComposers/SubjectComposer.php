<?php
/**
 * Created by PhpStorm.
 * User: soi
 * Date: 7/13/17
 * Time: 5:50 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\SubjectRepository;
use Illuminate\View\View;

class SubjectComposer
{
    private $repository;

    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function compose(View $view)
    {
        $list = $this->repository->pluck('name', 'id');
        $view->with(['subjectList' => $list]);
    }
}