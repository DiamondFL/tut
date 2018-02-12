<?php

namespace App\Http\Controllers\Involve;

use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    private $repository;

    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function syncRole(Request $request)
    {
        $input = $request->only('role_ids', 'id');
        $permission = $this->repository->find($input['id']);
        if ($permission)
        {
            $permission->role()->sync($input['role_ids']);
            return response()->json('Sync Success');
        }
        return response()->json('Not Found Role');
    }

    public function roles(Request $request)
    {
        $id = $request->get('id');
        $permission = DB::table('role_permission')
            ->where('permission_id', $id)
            ->pluck('role_id')
            ->toArray();
        return response()->json($permission);
    }
}
