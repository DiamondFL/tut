<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\LessonResult;
use Tutorial\Http\Requests\LessonResultCreateRequest;
use Tutorial\Http\Requests\LessonResultUpdateRequest;
use Tutorial\Repositories\LessonResultRepository;
use Illuminate\Http\Request;

class LessonResultController extends Controller
{
    private $repository;
    public function __construct(LessonResultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessonResults'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('lesson_results::lesson-result.table', $data)->render();
        }
        return view('lesson_results::lesson-result.index', $data);
    }

    public function create()
    {
        return view('lesson_results::lesson-result.create');
    }

    public function store(LessonResultCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('lesson-result.index');
    }

    public function show($id)
    {
        $lessonResult = $this->repository->find($id);
        if(empty($lessonResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('lesson_results::lesson-result.show', compact('lessonResult'));
    }

    public function edit($id)
    {
        $lessonResult = $this->repository->find($id);
        if(empty($lessonResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('lesson_results::lesson-result.update', compact('lessonResult'));
    }

    public function update(LessonResultUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lessonResult = $this->repository->find($id);
        if(empty($lessonResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lessonResult);
        session()->flash('success', 'update success');
        return redirect()->route('lesson-result.index');
    }

    public function destroy($id)
    {
        $lessonResult = $this->repository->find($id);
        if(empty($lessonResult))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
