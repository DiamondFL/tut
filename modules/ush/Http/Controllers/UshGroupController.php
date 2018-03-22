<?php

namespace Ush\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Models\UshGroup;
use Ush\Http\Requests\UshGroupCreateRequest;
use Ush\Http\Requests\UshGroupUpdateRequest;
use Ush\Repositories\UshGroupRepository;
use Illuminate\Http\Request;

class UshGroupController extends Controller
{
    private $repository;
    public function __construct(UshGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushGroups'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush::ush-group.table', $data)->render();
        }
        return view('ush::ush-group.index', $data);
    }

    public function create()
    {
        return view('ush::ush-group.create');
    }

    public function store(UshGroupCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-group.index');
    }

    public function show($id)
    {
        $ushGroup = $this->repository->find($id);
        if(empty($ushGroup))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush::ush-group.show', compact('ushGroup'));
    }

    public function edit($id)
    {
        $ushGroup = $this->repository->find($id);
        if(empty($ushGroup))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush::ush-group.update', compact('ushGroup'));
    }

    public function update(UshGroupUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushGroup = $this->repository->find($id);
        if(empty($ushGroup))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushGroup);
        session()->flash('success', 'update success');
        return redirect()->route('ush-group.index');
    }

    public function destroy($id)
    {
        $ushGroup = $this->repository->find($id);
        if(empty($ushGroup))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
