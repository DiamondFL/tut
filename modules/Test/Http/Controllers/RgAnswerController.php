<?php

namespace Test\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Test\Models\RgAnswer;
use Test\Http\Requests\RgAnswerCreateRequest;
use Test\Http\Requests\RgAnswerUpdateRequest;
use Test\Repositories\RgAnswerRepository;
use Illuminate\Http\Request;

class RgAnswerController extends Controller
{
    private $repository;
    public function __construct(RgAnswerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['rgAnswers'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('trg::rg-answer.table', $data)->render();
        }
        return view('trg::rg-answer.index', $data);
    }

    public function create()
    {
        return view('trg::rg-answer.create');
    }

    public function store(RgAnswerCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('rg-answer.index');
    }

    public function show($id)
    {
        $rgAnswer = $this->repository->find($id);
        if(empty($rgAnswer))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-answer.show', compact('rgAnswer'));
    }

    public function edit($id)
    {
        $rgAnswer = $this->repository->find($id);
        if(empty($rgAnswer))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-answer.update', compact('rgAnswer'));
    }

    public function update(RgAnswerUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $rgAnswer = $this->repository->find($id);
        if(empty($rgAnswer))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $rgAnswer);
        session()->flash('success', 'update success');
        return redirect()->route('rg-answer.index');
    }

    public function destroy($id)
    {
        $rgAnswer = $this->repository->find($id);
        if(empty($rgAnswer))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
