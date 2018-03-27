<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\Lesson;
use Tutorial\Http\Requests\LessonCreateRequest;
use Tutorial\Http\Requests\LessonUpdateRequest;
use Tutorial\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private $repository;
    public function __construct(LessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessons'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('sections::lesson.table', $data)->render();
        }
        return view('sections::lesson.index', $data);
    }

    public function create()
    {
        return view('sections::lesson.create');
    }

    public function store(LessonCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('lesson.index');
    }

    public function show($id)
    {
        $lesson = $this->repository->find($id);
        if(empty($lesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('sections::lesson.show', compact('lesson'));
    }

    public function edit($id)
    {
        $lesson = $this->repository->find($id);
        if(empty($lesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('sections::lesson.update', compact('lesson'));
    }

    public function update(LessonUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lesson = $this->repository->find($id);
        if(empty($lesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lesson);
        session()->flash('success', 'update success');
        return redirect()->route('lesson.index');
    }

    public function destroy($id)
    {
        $lesson = $this->repository->find($id);
        if(empty($lesson))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
