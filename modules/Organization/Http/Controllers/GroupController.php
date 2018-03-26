<?php

namespace Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Organization\Models\Group;
use Organization\Http\Requests\GroupCreateRequest;
use Organization\Http\Requests\GroupUpdateRequest;
use Organization\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $repository;
    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['Groups'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('organ::-group.table', $data)->render();
        }
        return view('organ::-group.index', $data);
    }

    public function create()
    {
        return view('organ::-group.create');
    }

    public function store(GroupCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('-group.index');
    }

    public function show($id)
    {
        $Group = $this->repository->find($id);
        if(empty($Group))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('organ::-group.show', compact('Group'));
    }

    public function edit($id)
    {
        $Group = $this->repository->find($id);
        if(empty($Group))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('organ::-group.update', compact('Group'));
    }

    public function update(GroupUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $Group = $this->repository->find($id);
        if(empty($Group))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $Group);
        session()->flash('success', 'update success');
        return redirect()->route('-group.index');
    }

    public function destroy($id)
    {
        $Group = $this->repository->find($id);
        if(empty($Group))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
