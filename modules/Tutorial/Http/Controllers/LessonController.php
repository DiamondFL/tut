<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Istruct\MultiInheritance\ControllersTrait;
use Tutorial\Models\Lesson;
use Tutorial\Http\Requests\LessonCreateRequest;
use Tutorial\Http\Requests\LessonUpdateRequest;
use Tutorial\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private $repository;
//    use ControllersTrait;
    public function __construct(LessonRepository $repository)
    {
        $this->repository = $repository;
    }
    public function lists(Request $request) {
        $input = $request->all();
        return $this->repository->filterList($input, TITLE_COL);
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['lessons'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::lesson.table', $data)->render();
        }
        return view('tut::lesson.index', $data);
    }

    public function create()
    {
        return view('tut::lesson.create');
    }

    public function store(LessonCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
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
        return view('tut::lesson.show', compact('lesson'));
    }

    public function edit($id)
    {
        $data = $this->repository->edit($id);
        if(empty($data))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::lesson.update', $data);
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
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
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
