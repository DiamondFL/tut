<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshWeight;
use Ush\Product\Http\Requests\UshWeightCreateRequest;
use Ush\Product\Http\Requests\UshWeightUpdateRequest;
use Ush\Product\Repositories\UshWeightRepository;
use Illuminate\Http\Request;

class UshWeightController extends Controller
{
    private $repository;
    public function __construct(UshWeightRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushWeights'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-weight.table', $data)->render();
        }
        return view('ush-p::ush-weight.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-weight.create');
    }

    public function store(UshWeightCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-weight.index');
    }

    public function show($id)
    {
        $ushWeight = $this->repository->find($id);
        if(empty($ushWeight))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-weight.show', compact('ushWeight'));
    }

    public function edit($id)
    {
        $ushWeight = $this->repository->find($id);
        if(empty($ushWeight))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-weight.update', compact('ushWeight'));
    }

    public function update(UshWeightUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushWeight = $this->repository->find($id);
        if(empty($ushWeight))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushWeight);
        session()->flash('success', 'update success');
        return redirect()->route('ush-weight.index');
    }

    public function destroy($id)
    {
        $ushWeight = $this->repository->find($id);
        if(empty($ushWeight))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
