<?php

namespace Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Organization\Models\Category;
use Organization\Http\Requests\CategoryCreateRequest;
use Organization\Http\Requests\CategoryUpdateRequest;
use Organization\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['Categories'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('organ::category.table', $data)->render();
        }
        return view('organ::category.index', $data);
    }

    public function create()
    {
        return view('organ::category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $input = $request->all();
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = $this->repository->find($id);
        if(empty($category))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $subCategories = $category->subCategories()->pluck('name', 'id');
        return view('organ::category.show', compact('category', 'subCategories'));
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        if(empty($category))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $subCategories = $category->subCategories()->pluck('name', 'id');
        return view('organ::category.update', compact('category', 'subCategories'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $category = $this->repository->find($id);
        if(empty($category))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $category);
        session()->flash('success', 'update success');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = $this->repository->find($id);
        if(empty($category))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
