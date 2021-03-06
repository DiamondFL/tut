<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\LessonSubComment;
use Tutorial\Http\Requests\LessonSubCommentCreateRequest;
use Tutorial\Http\Requests\LessonSubCommentUpdateRequest;
use Tutorial\Repositories\LessonSubCommentRepository;
use Illuminate\Http\Request;

class LessonSubCommentController extends Controller
{
    private $repository;
    public function __construct(LessonSubCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessonSubComments'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::lesson-sub-comment.table', $data)->render();
        }
        return view('tut::lesson-sub-comment.index', $data);
    }

    public function create()
    {
        return view('tut::lesson-sub-comment.create');
    }

    public function store(LessonSubCommentCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('lesson-sub-comment.index');
    }

    public function show($id)
    {
        $lessonSubComment = $this->repository->find($id);
        if(empty($lessonSubComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-sub-comment.show', compact('lessonSubComment'));
    }

    public function edit($id)
    {
        $lessonSubComment = $this->repository->find($id);
        if(empty($lessonSubComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-sub-comment.update', compact('lessonSubComment'));
    }

    public function update(LessonSubCommentUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lessonSubComment = $this->repository->find($id);
        if(empty($lessonSubComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lessonSubComment);
        session()->flash('success', 'update success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('lesson-sub-comment.index');
    }

    public function destroy($id)
    {
        $lessonSubComment = $this->repository->find($id);
        if(empty($lessonSubComment))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
