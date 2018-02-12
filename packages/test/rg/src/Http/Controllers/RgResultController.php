<?php

namespace Test\Rg\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Test\Rg\Models\RgResult;
use Test\Rg\Http\Requests\RgResultCreateRequest;
use Test\Rg\Http\Requests\RgResultUpdateRequest;
use Test\Rg\Repositories\RgResultRepository;
use Illuminate\Http\Request;

class RgResultController extends Controller
{
    private $repository;
    public function __construct(RgResultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['rgResults'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('trg::rg-result.table', $data)->render();
        }
        return view('trg::rg-result.index', $data);
    }

    public function create()
    {
        return view('trg::rg-result.create');
    }

    public function store(RgResultCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('rg-result.index');
    }

    public function show($id)
    {
        $rgResult = $this->repository->find($id);
        if(empty($rgResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-result.show', compact('rgResult'));
    }

    public function edit($id)
    {
        $rgResult = $this->repository->find($id);
        if(empty($rgResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-result.update', compact('rgResult'));
    }

    public function update(RgResultUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $rgResult = $this->repository->find($id);
        if(empty($rgResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $rgResult);
        session()->flash('success', 'update success');
        return redirect()->route('rg-result.index');
    }

    public function destroy($id)
    {
        $rgResult = $this->repository->find($id);
        if(empty($rgResult))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
