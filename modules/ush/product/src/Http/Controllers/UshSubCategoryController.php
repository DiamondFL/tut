<?php

namespace Ush\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Istruct\MultiInheritance\ControllersTrait;
use Ush\Http\Requests\UshSubCategoryCreateRequest;
use Ush\Http\Requests\UshSubCategoryUpdateRequest;
use Ush\Repositories\UshSubCategoryRepository;
use Illuminate\Http\Request;

class UshSubCategoryController extends Controller
{
    private $repository;
    use ControllersTrait;
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
            return view('ush::ush-sub-category.table', $data)->render();
        }
        return view('ush::ush-sub-category.index', $data);
    }

    public function create()
    {
        return view('ush::ush-sub-category.create');
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
        return view('ush::ush-sub-category.show', compact('ushSubCategory'));
    }

    public function edit($id)
    {
        $ushSubCategory = $this->repository->find($id);
        if(empty($ushSubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush::ush-sub-category.update', compact('ushSubCategory'));
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
