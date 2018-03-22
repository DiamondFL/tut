<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Docs\Models\DocProject;
use Docs\Http\Requests\DocProjectCreateRequest;
use Docs\Http\Requests\DocProjectUpdateRequest;
use Docs\Repositories\DocProjectRepository;
use Illuminate\Http\Request;

class DocProjectController extends Controller
{
    private $repository;
    public function __construct(DocProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docProjects'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-project.table', $data)->render();
        }
        return view('doc::doc-project.index', $data);
    }

    public function create()
    {
        return view('doc::doc-project.create');
    }

    public function store(DocProjectCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-project.index');
    }

    public function show($id)
    {
        $docProject = $this->repository->find($id);
        if(empty($docProject))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-project.show', compact('docProject'));
    }

    public function edit($id)
    {
        $docProject = $this->repository->find($id);
        if(empty($docProject))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-project.update', compact('docProject'));
    }

    public function update(DocProjectUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docProject = $this->repository->find($id);
        if(empty($docProject))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docProject);
        session()->flash('success', 'update success');
        return redirect()->route('doc-project.index');
    }

    public function destroy($id)
    {
        $docProject = $this->repository->find($id);
        if(empty($docProject))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
