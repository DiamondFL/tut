<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshProduct;
use Ush\Product\Http\Requests\UshProductCreateRequest;
use Ush\Product\Http\Requests\UshProductUpdateRequest;
use Ush\Product\Repositories\UshProductRepository;
use Illuminate\Http\Request;

class UshProductController extends Controller
{
    private $repository;
    public function __construct(UshProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushProducts'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-product.table', $data)->render();
        }
        return view('ush-p::ush-product.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-product.create');
    }

    public function store(UshProductCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-product.index');
    }

    public function show($id)
    {
        $ushProduct = $this->repository->find($id);
        if(empty($ushProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-product.show', compact('ushProduct'));
    }

    public function edit($id)
    {
        $ushProduct = $this->repository->find($id);
        if(empty($ushProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-product.update', compact('ushProduct'));
    }

    public function update(UshProductUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushProduct = $this->repository->find($id);
        if(empty($ushProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushProduct);
        session()->flash('success', 'update success');
        return redirect()->route('ush-product.index');
    }

    public function destroy($id)
    {
        $ushProduct = $this->repository->find($id);
        if(empty($ushProduct))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
