<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\MiniTest;
use Tutorial\Http\Requests\MiniTestCreateRequest;
use Tutorial\Http\Requests\MiniTestUpdateRequest;
use Tutorial\Repositories\MiniTestRepository;
use Illuminate\Http\Request;

class MiniTestController extends Controller
{
    private $repository;
    public function __construct(MiniTestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['miniTests'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('mini-test::mini-test.table', $data)->render();
        }
        return view('mini-test::mini-test.index', $data);
    }

    public function create()
    {
        return view('mini-test::mini-test.create');
    }

    public function store(MiniTestCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('mini-test.index');
    }

    public function show($id)
    {
        $miniTest = $this->repository->find($id);
        if(empty($miniTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('mini-test::mini-test.show', compact('miniTest'));
    }

    public function edit($id)
    {
        $miniTest = $this->repository->find($id);
        if(empty($miniTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('mini-test::mini-test.update', compact('miniTest'));
    }

    public function update(MiniTestUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $miniTest = $this->repository->find($id);
        if(empty($miniTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $miniTest);
        session()->flash('success', 'update success');
        return redirect()->route('mini-test.index');
    }

    public function destroy($id)
    {
        $miniTest = $this->repository->find($id);
        if(empty($miniTest))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
