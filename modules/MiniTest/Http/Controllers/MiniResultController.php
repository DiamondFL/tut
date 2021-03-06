<?php

namespace MiniTest\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use MiniTest\Models\MiniResult;
use MiniTest\Http\Requests\MiniResultCreateRequest;
use MiniTest\Http\Requests\MiniResultUpdateRequest;
use MiniTest\Repositories\MiniResultRepository;
use Illuminate\Http\Request;

class MiniResultController extends Controller
{
    private $repository;
    public function __construct(MiniResultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['miniResults'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('mini-results::mini-result.table', $data)->render();
        }
        return view('mini-results::mini-result.index', $data);
    }

    public function create()
    {
        return view('mini-results::mini-result.create');
    }

    public function store(MiniResultCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('mini-result.index');
    }

    public function show($id)
    {
        $miniResult = $this->repository->find($id);
        if(empty($miniResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('mini-results::mini-result.show', compact('miniResult'));
    }

    public function edit($id)
    {
        $miniResult = $this->repository->find($id);
        if(empty($miniResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('mini-results::mini-result.update', compact('miniResult'));
    }

    public function update(MiniResultUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $miniResult = $this->repository->find($id);
        if(empty($miniResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $miniResult);
        session()->flash('success', 'update success');
        return redirect()->route('mini-result.index');
    }

    public function destroy($id)
    {
        $miniResult = $this->repository->find($id);
        if(empty($miniResult))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
