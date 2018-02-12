<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Models\Score;
use App\Http\Requests\ScoreCreateRequest;
use App\Http\Requests\ScoreUpdateRequest;
use App\Repositories\ScoreRepository;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    private $repository;
    public function __construct(ScoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['scores'] = $this->repository->myPaginate($input);
        $data['score'] = $this->repository->makeModel();
        if($request->ajax())
        {
            return view('scores.table', $data)->render();
        }
        return view('scores.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', $this->repository->makeModel());
        return view('scores.create');
    }

    public function store(ScoreCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('scores.index');
    }

    public function show($id)
    {
        $score = $this->repository->find($id);
        if(empty($score))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('scores.show', compact('score'));
    }

    public function edit($id)
    {
        $score = $this->repository->find($id);
        if(empty($score))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $score);

        return view('scores.update', compact('score'));
    }

    public function update(ScoreUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $score = $this->repository->find($id);
        if(empty($score))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $score);
        session()->flash('success', 'update success');
        return redirect()->route('scores.index');
    }

    public function destroy($id)
    {
        $score = $this->repository->find($id);
        if(empty($score))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
