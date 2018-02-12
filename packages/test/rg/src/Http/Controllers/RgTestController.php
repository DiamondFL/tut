<?php

namespace Test\Rg\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Test\Rg\Models\RgTest;
use Test\Rg\Http\Requests\RgTestCreateRequest;
use Test\Rg\Http\Requests\RgTestUpdateRequest;
use Test\Rg\Repositories\RgTestRepository;
use Illuminate\Http\Request;

class RgTestController extends Controller
{
    private $repository;
    public function __construct(RgTestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['rgTests'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('trg::rg-test.table', $data)->render();
        }
        return view('trg::rg-test.index', $data);
    }

    public function create()
    {
        return view('trg::rg-test.create');
    }

    public function store(RgTestCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('rg-test.index');
    }

    public function show($id)
    {
        $rgTest = $this->repository->find($id);
        if(empty($rgTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-test.show', compact('rgTest'));
    }

    public function edit($id)
    {
        $rgTest = $this->repository->find($id);
        if(empty($rgTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-test.update', compact('rgTest'));
    }

    public function update(RgTestUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $rgTest = $this->repository->find($id);
        if(empty($rgTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $rgTest);
        session()->flash('success', 'update success');
        return redirect()->route('rg-test.index');
    }

    public function destroy($id)
    {
        $rgTest = $this->repository->find($id);
        if(empty($rgTest))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
