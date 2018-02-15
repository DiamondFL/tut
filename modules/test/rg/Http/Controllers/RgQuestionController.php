<?php

namespace Test\Rg\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Test\Rg\Models\RgQuestion;
use Test\Rg\Http\Requests\RgQuestionCreateRequest;
use Test\Rg\Http\Requests\RgQuestionUpdateRequest;
use Test\Rg\Repositories\RgQuestionRepository;
use Illuminate\Http\Request;

class RgQuestionController extends Controller
{
    private $repository;
    public function __construct(RgQuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['rgQuestions'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('trg::rg-question.table', $data)->render();
        }
        return view('trg::rg-question.index', $data);
    }

    public function create()
    {
        return view('trg::rg-question.create');
    }

    public function store(RgQuestionCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('rg-question.index');
    }

    public function show($id)
    {
        $rgQuestion = $this->repository->find($id);
        if(empty($rgQuestion))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-question.show', compact('rgQuestion'));
    }

    public function edit($id)
    {
        $rgQuestion = $this->repository->find($id);
        if(empty($rgQuestion))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-question.update', compact('rgQuestion'));
    }

    public function update(RgQuestionUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $rgQuestion = $this->repository->find($id);
        if(empty($rgQuestion))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $rgQuestion);
        session()->flash('success', 'update success');
        return redirect()->route('rg-question.index');
    }

    public function destroy($id)
    {
        $rgQuestion = $this->repository->find($id);
        if(empty($rgQuestion))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
