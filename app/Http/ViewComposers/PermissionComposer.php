<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 5/10/17
 * Time: 8:26 AM
 */

namespace App\Http\ViewComposers;


use App\Repositories\PermissionRepository;
use Illuminate\View\View;

class PermissionComposer
{
    private $repository;
    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }
    public function compose(View $view)
    {
        $view->with(['permissionList' => $this->repository->pluck('display_name', 'id')]);
    }
}