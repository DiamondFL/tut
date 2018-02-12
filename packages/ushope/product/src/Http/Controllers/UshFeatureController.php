<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshFeature;
use Ush\Product\Http\Requests\UshFeatureCreateRequest;
use Ush\Product\Http\Requests\UshFeatureUpdateRequest;
use Ush\Product\Repositories\UshFeatureRepository;
use Illuminate\Http\Request;

class UshFeatureController extends Controller
{
    private $repository;
    public function __construct(UshFeatureRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushFeatures'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-feature.table', $data)->render();
        }
        return view('ush-p::ush-feature.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-feature.create');
    }

    public function store(UshFeatureCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-feature.index');
    }

    public function show($id)
    {
        $ushFeature = $this->repository->find($id);
        if(empty($ushFeature))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-feature.show', compact('ushFeature'));
    }

    public function edit($id)
    {
        $ushFeature = $this->repository->find($id);
        if(empty($ushFeature))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-feature.update', compact('ushFeature'));
    }

    public function update(UshFeatureUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushFeature = $this->repository->find($id);
        if(empty($ushFeature))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushFeature);
        session()->flash('success', 'update success');
        return redirect()->route('ush-feature.index');
    }

    public function destroy($id)
    {
        $ushFeature = $this->repository->find($id);
        if(empty($ushFeature))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
