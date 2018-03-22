<?php

namespace App\Http\Controllers\Auth;

use ACL\Repositories\UserRepositoryEloquent;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }
    public function index($id)
    {
        $data['profile'] = $this->repository->find($id);
        return view('flat.auth.profile', $data);
    }
}
