<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\Tutorial;
use Tutorial\Http\Requests\TutorialCreateRequest;
use Tutorial\Http\Requests\TutorialUpdateRequest;
use Tutorial\Repositories\TutorialRepository;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    private $repository;
    public function __construct(TutorialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['tutorials'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::tutorial.table', $data)->render();
        }
        return view('tut::tutorial.index', $data);
    }

    public function create()
    {
        return view('tut::tutorial.create');
    }

    public function store(TutorialCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('tutorial.index');
    }

    public function show($id)
    {
        $tutorial = $this->repository->find($id);
        if(empty($tutorial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::tutorial.show', compact('tutorial'));
    }

    public function edit($id)
    {
        $tutorial = $this->repository->find($id);
        if(empty($tutorial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::tutorial.update', compact('tutorial'));
    }

    public function update(TutorialUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $tutorial = $this->repository->find($id);
        if(empty($tutorial))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $tutorial);
        session()->flash('success', 'update success');
        return redirect()->route('tutorial.index');
    }

    public function destroy($id)
    {
        $tutorial = $this->repository->find($id);
        if(empty($tutorial))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
