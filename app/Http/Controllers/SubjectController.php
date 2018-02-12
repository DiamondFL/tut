<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Models\Subject;
use App\Http\Requests\SubjectCreateRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $repository;
    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        foreach ($input as $k => $v)
        {
            $input[$k] = trim($v);
        }
        $data['subjects'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('subjects.table', $data)->render();
        }
        return view('subjects.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', $this->repository->makeModel());
        return view('subjects.create');
    }

    public function store(SubjectCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('subjects.index');
    }

    public function show($id)
    {
        $subjects = $this->repository->find($id);
        if(empty($subjects))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('subjects.show', compact('subjects'));
    }

    public function edit($id)
    {
        $subjects = $this->repository->find($id);
        if(empty($subjects))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $subjects);

        return view('subjects.update', compact('subjects'));
    }

    public function update(SubjectUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $subjects = $this->repository->find($id);
        if(empty($subjects))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $subjects);
        session()->flash('success', 'update success');
        return redirect()->route('subjects.index');
    }

    public function destroy($id)
    {
        $subjects = $this->repository->find($id);
        if(empty($subjects))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
