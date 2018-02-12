<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Models\Question;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $repository;
    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        foreach ($input as $k => $v)
        {
            $input[$k] = trim($v);
        }
        $data['questions'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('questions.table', $data)->render();
        }
        return view('questions.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', $this->repository->makeModel());
        return view('questions.create');
    }

    public function store(QuestionCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('questions.index');
    }

    public function show($id)
    {
        $questions = $this->repository->find($id);
        if(empty($questions))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('questions.show', compact('questions'));
    }

    public function edit($id)
    {
        $questions = $this->repository->find($id);
        if(empty($questions))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $questions);

        return view('questions.update', compact('questions'));
    }

    public function update(QuestionUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $questions = $this->repository->find($id);
        if(empty($questions))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $questions);
        session()->flash('success', 'update success');
        return redirect()->route('questions.index');
    }

    public function destroy($id)
    {
        $questions = $this->repository->find($id);
        if(empty($questions))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
