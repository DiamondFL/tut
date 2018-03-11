<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/10/17
 * Time: 8:25 AM
 */

namespace App\Http\ViewComposers;


use App\Repositories\UserRepositoryEloquent;
use Illuminate\View\View;

class UserComposer
{
    private $repository;
    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view)
    {
        $view->with(['userList' => $this->repository->lists('email', 'id')]);
    }
}