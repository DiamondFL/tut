<?php

namespace DocPros\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use DocPros\Models\DocLesson;
use DocPros\Http\Requests\DocLessonCreateRequest;
use DocPros\Http\Requests\DocLessonUpdateRequest;
use DocPros\Repositories\DocLessonRepository;
use Illuminate\Http\Request;

class DocLessonController extends Controller
{
    private $repository;
    public function __construct(DocLessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docLessons'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-lesson.table', $data)->render();
        }
        return view('doc::doc-lesson.index', $data);
    }

    public function create()
    {
        return view('doc::doc-lesson.create');
    }

    public function store(DocLessonCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-lesson.index');
    }

    public function show($id)
    {
        $docLesson = $this->repository->find($id);
        if(empty($docLesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-lesson.show', compact('docLesson'));
    }

    public function edit($id)
    {
        $docLesson = $this->repository->find($id);
        if(empty($docLesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-lesson.update', compact('docLesson'));
    }

    public function update(DocLessonUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docLesson = $this->repository->find($id);
        if(empty($docLesson))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docLesson);
        session()->flash('success', 'update success');
        return redirect()->route('doc-lesson.index');
    }

    public function destroy($id)
    {
        $docLesson = $this->repository->find($id);
        if(empty($docLesson))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}