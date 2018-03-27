<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\LessonTest;
use Tutorial\Http\Requests\LessonTestCreateRequest;
use Tutorial\Http\Requests\LessonTestUpdateRequest;
use Tutorial\Repositories\LessonTestRepository;
use Illuminate\Http\Request;

class LessonTestController extends Controller
{
    private $repository;
    public function __construct(LessonTestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessonTests'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('lesson_tests::lesson-test.table', $data)->render();
        }
        return view('lesson_tests::lesson-test.index', $data);
    }

    public function create()
    {
        return view('lesson_tests::lesson-test.create');
    }

    public function store(LessonTestCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('lesson-test.index');
    }

    public function show($id)
    {
        $lessonTest = $this->repository->find($id);
        if(empty($lessonTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('lesson_tests::lesson-test.show', compact('lessonTest'));
    }

    public function edit($id)
    {
        $lessonTest = $this->repository->find($id);
        if(empty($lessonTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('lesson_tests::lesson-test.update', compact('lessonTest'));
    }

    public function update(LessonTestUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lessonTest = $this->repository->find($id);
        if(empty($lessonTest))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lessonTest);
        session()->flash('success', 'update success');
        return redirect()->route('lesson-test.index');
    }

    public function destroy($id)
    {
        $lessonTest = $this->repository->find($id);
        if(empty($lessonTest))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
