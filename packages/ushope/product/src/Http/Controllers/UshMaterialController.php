<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshMaterial;
use Ush\Product\Http\Requests\UshMaterialCreateRequest;
use Ush\Product\Http\Requests\UshMaterialUpdateRequest;
use Ush\Product\Repositories\UshMaterialRepository;
use Illuminate\Http\Request;

class UshMaterialController extends Controller
{
    private $repository;
    public function __construct(UshMaterialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushMaterials'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-material.table', $data)->render();
        }
        return view('ush-p::ush-material.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-material.create');
    }

    public function store(UshMaterialCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-material.index');
    }

    public function show($id)
    {
        $ushMaterial = $this->repository->find($id);
        if(empty($ushMaterial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-material.show', compact('ushMaterial'));
    }

    public function edit($id)
    {
        $ushMaterial = $this->repository->find($id);
        if(empty($ushMaterial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-material.update', compact('ushMaterial'));
    }

    public function update(UshMaterialUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushMaterial = $this->repository->find($id);
        if(empty($ushMaterial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushMaterial);
        session()->flash('success', 'update success');
        return redirect()->route('ush-material.index');
    }

    public function destroy($id)
    {
        $ushMaterial = $this->repository->find($id);
        if(empty($ushMaterial))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
