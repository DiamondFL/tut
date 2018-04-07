<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\LessonComment;
use Tutorial\Http\Requests\LessonCommentCreateRequest;
use Tutorial\Http\Requests\LessonCommentUpdateRequest;
use Tutorial\Repositories\LessonCommentRepository;
use Illuminate\Http\Request;

class LessonCommentController extends Controller
{
    private $repository;
    public function __construct(LessonCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessonComments'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::lesson-comment.table', $data)->render();
        }
        return view('tut::lesson-comment.index', $data);
    }

    public function create()
    {
        return view('tut::lesson-comment.create');
    }

    public function store(LessonCommentCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('lesson-comment.index');
    }

    public function show($id)
    {
        $lessonComment = $this->repository->find($id);
        if(empty($lessonComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-comment.show', compact('lessonComment'));
    }

    public function edit($id)
    {
        $lessonComment = $this->repository->find($id);
        if(empty($lessonComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-comment.update', compact('lessonComment'));
    }

    public function update(LessonCommentUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lessonComment = $this->repository->find($id);
        if(empty($lessonComment))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lessonComment);
        session()->flash('success', 'update success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('lesson-comment.index');
    }

    public function destroy($id)
    {
        $lessonComment = $this->repository->find($id);
        if(empty($lessonComment))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
