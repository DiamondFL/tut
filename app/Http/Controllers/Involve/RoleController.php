<?php

namespace App\Http\Controllers\Involve;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    private $repository;
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }
    public function syncPermission(Request $request)
    {
        $input = $request->only('permission_ids', 'id');
        $role = $this->repository->find($input['id']);
        if (empty($role))
        {
            return response()->json('Not Found Permission');
        }
        dd($input['permission_ids']);
        $role->permission()->sync($input['permission_ids']);
        if($request->ajax())
        {
            return response()->json('Sync Success');
        }
        session()->flash('success', 'Sync Success');
        return redirect()->back();

    }

    public function roles(Request $request)
    {
        $id = $request->get('id');
        $role = DB::table('role_permission')
            ->where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();
        return response()->json($role);
    }

    public function getAssignedPermission(Request $request)
    {
        $id = $request->get('id');
        return DB::table('role_permission')->where('role_id', $id)->pluck('permission_id');
    }
}
