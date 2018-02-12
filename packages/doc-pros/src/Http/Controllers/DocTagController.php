<?php

namespace DocPros\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use DocPros\Models\DocTag;
use DocPros\Http\Requests\DocTagCreateRequest;
use DocPros\Http\Requests\DocTagUpdateRequest;
use DocPros\Repositories\DocTagRepository;
use Illuminate\Http\Request;

class DocTagController extends Controller
{
    private $repository;
    public function __construct(DocTagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docTags'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-tag.table', $data)->render();
        }
        return view('doc::doc-tag.index', $data);
    }

    public function create()
    {
        return view('doc::doc-tag.create');
    }

    public function store(DocTagCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-tag.index');
    }

    public function show($id)
    {
        $docTag = $this->repository->find($id);
        if(empty($docTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-tag.show', compact('docTag'));
    }

    public function edit($id)
    {
        $docTag = $this->repository->find($id);
        if(empty($docTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-tag.update', compact('docTag'));
    }

    public function update(DocTagUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docTag = $this->repository->find($id);
        if(empty($docTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docTag);
        session()->flash('success', 'update success');
        return redirect()->route('doc-tag.index');
    }

    public function destroy($id)
    {
        $docTag = $this->repository->find($id);
        if(empty($docTag))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
