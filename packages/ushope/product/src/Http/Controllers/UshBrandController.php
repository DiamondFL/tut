<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshBrand;
use Ush\Product\Http\Requests\UshBrandCreateRequest;
use Ush\Product\Http\Requests\UshBrandUpdateRequest;
use Ush\Product\Repositories\UshBrandRepository;
use Illuminate\Http\Request;

class UshBrandController extends Controller
{
    private $repository;
    public function __construct(UshBrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushBrands'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-brand.table', $data)->render();
        }
        return view('ush-p::ush-brand.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-brand.create');
    }

    public function store(UshBrandCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-brand.index');
    }

    public function show($id)
    {
        $ushBrand = $this->repository->find($id);
        if(empty($ushBrand))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-brand.show', compact('ushBrand'));
    }

    public function edit($id)
    {
        $ushBrand = $this->repository->find($id);
        if(empty($ushBrand))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-brand.update', compact('ushBrand'));
    }

    public function update(UshBrandUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushBrand = $this->repository->find($id);
        if(empty($ushBrand))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushBrand);
        session()->flash('success', 'update success');
        return redirect()->route('ush-brand.index');
    }

    public function destroy($id)
    {
        $ushBrand = $this->repository->find($id);
        if(empty($ushBrand))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
