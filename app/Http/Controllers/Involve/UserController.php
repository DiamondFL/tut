<?php

namespace App\Http\Controllers\Involve;

use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }
    public function syncRole(Request $request)
    {
        $input = $request->only('role_ids', 'id');
        $user = $this->repository->find($input['id']);
        if ($user)
        {
            $user->role()->sync($input['role_ids']);
            return response()->json('Sync Success');
        }
        return response()->json('Not Found Role');
    }
    public function roles(Request $request)
    {
        $id = $request->get('id');
        $permission = DB::table('role_user')
            ->where('user_id', $id)
            ->pluck('role_id')
            ->toArray();
        return response()->json($permission);
    }
}
