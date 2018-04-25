<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Http\Requests\TutorialTestCreateRequest;
use Tutorial\Http\Requests\TutorialTestUpdateRequest;
use Tutorial\Repositories\TutorialTestRepository;
use Illuminate\Http\Request;

class TutorialTestController extends Controller
{
    private $repository;
    public function __construct(TutorialTestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['tutorialTests'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::tutorial-test.table', $data)->render();
        }
        return view('tut::tutorial-test.index', $data);
    }

    public function create()
    {
        return view('tut::tutorial-test.create');
    }

    public function store(TutorialTestCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('tutorial-test.index');
    }

    public function show($id)
    {
        $tutorialTest = $this->repository->find($id);
        if(empty($tutorialTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::tutorial-test.show', compact('tutorialTest'));
    }

    public function edit($id)
    {
        $tutorialTest = $this->repository->find($id);
        if(empty($tutorialTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return view('tut::tutorial-test.update', compact('tutorialTest'));
    }

    public function update(TutorialTestUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $tutorialTest = $this->repository->find($id);
        if(empty($tutorialTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $tutorialTest);
        session()->flash('success', 'update success');
        return redirect()->route('tutorial-test.index');
    }

    public function destroy($id)
    {
        $tutorialTest = $this->repository->find($id);
        if(empty($tutorialTest))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
