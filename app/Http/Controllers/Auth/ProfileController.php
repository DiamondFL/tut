<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;
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
