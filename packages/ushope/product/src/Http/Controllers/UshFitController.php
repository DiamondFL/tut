<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshFit;
use Ush\Product\Http\Requests\UshFitCreateRequest;
use Ush\Product\Http\Requests\UshFitUpdateRequest;
use Ush\Product\Repositories\UshFitRepository;
use Illuminate\Http\Request;

class UshFitController extends Controller
{
    private $repository;
    public function __construct(UshFitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushFits'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-fit.table', $data)->render();
        }
        return view('ush-p::ush-fit.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-fit.create');
    }

    public function store(UshFitCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-fit.index');
    }

    public function show($id)
    {
        $ushFit = $this->repository->find($id);
        if(empty($ushFit))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-fit.show', compact('ushFit'));
    }

    public function edit($id)
    {
        $ushFit = $this->repository->find($id);
        if(empty($ushFit))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-fit.update', compact('ushFit'));
    }

    public function update(UshFitUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushFit = $this->repository->find($id);
        if(empty($ushFit))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushFit);
        session()->flash('success', 'update success');
        return redirect()->route('ush-fit.index');
    }

    public function destroy($id)
    {
        $ushFit = $this->repository->find($id);
        if(empty($ushFit))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
