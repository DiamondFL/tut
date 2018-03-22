<?php

namespace Ush\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Models\UshCategory;
use Ush\Http\Requests\UshCategoryCreateRequest;
use Ush\Http\Requests\UshCategoryUpdateRequest;
use Ush\Repositories\UshCategoryRepository;
use Illuminate\Http\Request;

class UshCategoryController extends Controller
{
    private $repository;
    public function __construct(UshCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushCategories'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush::ush-category.table', $data)->render();
        }
        return view('ush::ush-category.index', $data);
    }

    public function create()
    {
        return view('ush::ush-category.create');
    }

    public function store(UshCategoryCreateRequest $request)
    {
        $input = $request->all();
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-category.index');
    }

    public function show($id)
    {
        $ushCategory = $this->repository->find($id);
        if(empty($ushCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $subCategories = $ushCategory->subCategories()->pluck('name', 'id');
        return view('ush::ush-category.show', compact('ushCategory', 'subCategories'));
    }

    public function edit($id)
    {
        $ushCategory = $this->repository->find($id);
        if(empty($ushCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $subCategories = $ushCategory->subCategories()->pluck('name', 'id');
        return view('ush::ush-category.update', compact('ushCategory', 'subCategories'));
    }

    public function update(UshCategoryUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushCategory = $this->repository->find($id);
        if(empty($ushCategory))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushCategory);
        session()->flash('success', 'update success');
        return redirect()->route('ush-category.index');
    }

    public function destroy($id)
    {
        $ushCategory = $this->repository->find($id);
        if(empty($ushCategory))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
