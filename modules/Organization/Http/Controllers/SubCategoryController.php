<?php

namespace Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Istruct\MultiInheritance\ControllersTrait;
use Organization\Http\Requests\SubCategoryCreateRequest;
use Organization\Http\Requests\SubCategoryUpdateRequest;
use Organization\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $repository;
    use ControllersTrait;
    public function __construct(SubCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['SubCategories'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('organ::-sub-category.table', $data)->render();
        }
        return view('organ::-sub-category.index', $data);
    }

    public function create()
    {
        return view('organ::-sub-category.create');
    }

    public function store(SubCategoryCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        if($request->ajax()) {
            return response()->json(true);
        }
        session()->flash('success', 'create success');
        return redirect()->route('-sub-category.index');
    }

    public function show($id)
    {
        $SubCategory = $this->repository->find($id);
        if(empty($SubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('organ::-sub-category.show', compact('SubCategory'));
    }

    public function edit($id)
    {
        $SubCategory = $this->repository->find($id);
        if(empty($SubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('organ::-sub-category.update', compact('SubCategory'));
    }

    public function update(SubCategoryUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $SubCategory = $this->repository->find($id);
        if(empty($SubCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $SubCategory);
        session()->flash('success', 'update success');
        return redirect()->route('-sub-category.index');
    }

    public function destroy($id, Request $request)
    {
        $SubCategory = $this->repository->find($id);
        if(empty($SubCategory))
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
