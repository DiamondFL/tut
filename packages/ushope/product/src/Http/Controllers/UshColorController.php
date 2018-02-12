<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshColor;
use Ush\Product\Http\Requests\UshColorCreateRequest;
use Ush\Product\Http\Requests\UshColorUpdateRequest;
use Ush\Product\Repositories\UshColorRepository;
use Illuminate\Http\Request;

class UshColorController extends Controller
{
    private $repository;
    public function __construct(UshColorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushColors'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-color.table', $data)->render();
        }
        return view('ush-p::ush-color.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-color.create');
    }

    public function store(UshColorCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-color.index');
    }

    public function show($id)
    {
        $ushColor = $this->repository->find($id);
        if(empty($ushColor))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-color.show', compact('ushColor'));
    }

    public function edit($id)
    {
        $ushColor = $this->repository->find($id);
        if(empty($ushColor))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-color.update', compact('ushColor'));
    }

    public function update(UshColorUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushColor = $this->repository->find($id);
        if(empty($ushColor))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushColor);
        session()->flash('success', 'update success');
        return redirect()->route('ush-color.index');
    }

    public function destroy($id)
    {
        $ushColor = $this->repository->find($id);
        if(empty($ushColor))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
