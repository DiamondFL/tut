<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Docs\Http\Requests\DocExampleCreateRequest;
use Docs\Http\Requests\DocExampleUpdateRequest;
use Docs\Repositories\DocExampleRepository;
use Illuminate\Http\Request;

class DocExampleController extends Controller
{
    private $repository;
    public function __construct(DocExampleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $data['docExamples'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-example.table', $data)->render();
        }
        return view('doc::doc-example.index', $data);
    }

    public function create()
    {
        return view('doc::doc-example.create');
    }

    public function store(DocExampleCreateRequest $request)
    {
        $input = $request->all();
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-example.index');
    }

    public function show($id)
    {
        $docExample = $this->repository->find($id);
        if(empty($docExample))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $docExample->views = $docExample->views + 1;
        $docExample->last_view = date('Y-m-d H:s:i');
        $docExample->save();
        $tagList = $docExample->tags->pluck('name', 'id')->toArray();
        return view('doc::doc-example.show', compact('docExample', 'tagList'));
    }

    public function edit($id)
    {
        $docExample = $this->repository->find($id);
        if(empty($docExample))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $tagNames = $docExample->tags->pluck('name')->toArray();
        return view('doc::doc-example.update', compact('docExample', 'tagNames'));
    }

    public function update(DocExampleUpdateRequest $request, $id)
    {
        $input = $request->all();
        $docExample = $this->repository->find($id);
        if(empty($docExample))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docExample);
        session()->flash('success', 'update success');
        return redirect()->route('doc-example.index');
    }

    public function destroy($id)
    {
        $docExample = $this->repository->find($id);
        if(empty($docExample))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
