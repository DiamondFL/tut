<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshColorProduct;
use Ush\Product\Http\Requests\UshColorProductCreateRequest;
use Ush\Product\Http\Requests\UshColorProductUpdateRequest;
use Ush\Product\Repositories\UshColorProductRepository;
use Illuminate\Http\Request;

class UshColorProductController extends Controller
{
    private $repository;
    public function __construct(UshColorProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushColorProducts'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-color-product.table', $data)->render();
        }
        return view('ush-p::ush-color-product.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-color-product.create');
    }

    public function store(UshColorProductCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-color-product.index');
    }

    public function show($id)
    {
        $ushColorProduct = $this->repository->find($id);
        if(empty($ushColorProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-color-product.show', compact('ushColorProduct'));
    }

    public function edit($id)
    {
        $ushColorProduct = $this->repository->find($id);
        if(empty($ushColorProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-color-product.update', compact('ushColorProduct'));
    }

    public function update(UshColorProductUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushColorProduct = $this->repository->find($id);
        if(empty($ushColorProduct))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushColorProduct);
        session()->flash('success', 'update success');
        return redirect()->route('ush-color-product.index');
    }

    public function destroy($id)
    {
        $ushColorProduct = $this->repository->find($id);
        if(empty($ushColorProduct))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
