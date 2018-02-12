<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshSubCategory;
use Ush\Product\Http\Requests\UshSubCategoryCreateRequest;
use Ush\Product\Http\Requests\UshSubCategoryUpdateRequest;
use Ush\Product\Repositories\UshSubCategoryRepository;
use Illuminate\Http\Request;

class UshSubCategoryController extends Controller
{
    private $repository;
    public function __construct(UshSubCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushSubCategories'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-sub-category.table', $data)->render();
        }
        return view('ush-p::ush-sub-category.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-sub-category.create');
    }

    public function store(UshSubCategoryCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        if($request->ajax()) {
            return response()->json(true);
        }
        session()->flash('success', 'create success');
        return redirect()->route('ush-sub-category.index');
    }

    public function show($id)
    {
        $ushSubCategory = $this->repository->find($id);
        if(empty($ushSubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-sub-category.show', compact('ushSubCategory'));
    }

    public function edit($id)
    {
        $ushSubCategory = $this->repository->find($id);
        if(empty($ushSubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-sub-category.update', compact('ushSubCategory'));
    }

    public function update(UshSubCategoryUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushSubCategory = $this->repository->find($id);
        if(empty($ushSubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushSubCategory);
        session()->flash('success', 'update success');
        return redirect()->route('ush-sub-category.index');
    }

    public function destroy($id, Request $request)
    {
        $ushSubCategory = $this->repository->find($id);
        if(empty($ushSubCategory))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        if($request->ajax()) {
            return response()->json(true);
        }
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
