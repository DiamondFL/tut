<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Docs\Models\DocExampleTag;
use Docs\Http\Requests\DocExampleTagCreateRequest;
use Docs\Http\Requests\DocExampleTagUpdateRequest;
use Docs\Repositories\DocExampleTagRepository;
use Illuminate\Http\Request;

class DocExampleTagController extends Controller
{
    private $repository;
    public function __construct(DocExampleTagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docExampleTags'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-example-tag.table', $data)->render();
        }
        return view('doc::doc-example-tag.index', $data);
    }

    public function create()
    {
        return view('doc::doc-example-tag.create');
    }

    public function store(DocExampleTagCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-example-tag.index');
    }

    public function show($id)
    {
        $docExampleTag = $this->repository->find($id);
        if(empty($docExampleTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-example-tag.show', compact('docExampleTag'));
    }

    public function edit($id)
    {
        $docExampleTag = $this->repository->find($id);
        if(empty($docExampleTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-example-tag.update', compact('docExampleTag'));
    }

    public function update(DocExampleTagUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docExampleTag = $this->repository->find($id);
        if(empty($docExampleTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docExampleTag);
        session()->flash('success', 'update success');
        return redirect()->route('doc-example-tag.index');
    }

    public function destroy($id)
    {
        $docExampleTag = $this->repository->find($id);
        if(empty($docExampleTag))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
