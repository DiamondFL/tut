<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\LessonFeedBack;
use Tutorial\Http\Requests\LessonFeedBackCreateRequest;
use Tutorial\Http\Requests\LessonFeedBackUpdateRequest;
use Tutorial\Repositories\LessonFeedBackRepository;
use Illuminate\Http\Request;

class LessonFeedBackController extends Controller
{
    private $repository;
    public function __construct(LessonFeedBackRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessonFeedBacks'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::lesson-feed-back.table', $data)->render();
        }
        return view('tut::lesson-feed-back.index', $data);
    }

    public function create()
    {
        return view('tut::lesson-feed-back.create');
    }

    public function store(LessonFeedBackCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('lesson-feed-back.index');
    }

    public function show($id)
    {
        $lessonFeedBack = $this->repository->find($id);
        if(empty($lessonFeedBack))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-feed-back.show', compact('lessonFeedBack'));
    }

    public function edit($id)
    {
        $lessonFeedBack = $this->repository->find($id);
        if(empty($lessonFeedBack))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson-feed-back.update', compact('lessonFeedBack'));
    }

    public function update(LessonFeedBackUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $lessonFeedBack = $this->repository->find($id);
        if(empty($lessonFeedBack))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $lessonFeedBack);
        session()->flash('success', 'update success');
        return redirect()->route('lesson-feed-back.index');
    }

    public function destroy($id)
    {
        $lessonFeedBack = $this->repository->find($id);
        if(empty($lessonFeedBack))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
