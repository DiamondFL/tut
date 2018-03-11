<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['users'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('users.table', $data)->render();
        }
        return view('users.index', $data);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);
        if(empty($user))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        if(empty($user))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('users.update', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $user = $this->repository->find($id);
        if(empty($user))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $user);
        session()->flash('success', 'update success');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = $this->repository->find($id);
        if(empty($user))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
