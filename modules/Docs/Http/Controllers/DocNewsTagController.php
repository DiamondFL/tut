<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Docs\Models\DocNewsTag;
use Docs\Http\Requests\DocNewsTagCreateRequest;
use Docs\Http\Requests\DocNewsTagUpdateRequest;
use Docs\Repositories\DocNewsTagRepository;
use Illuminate\Http\Request;

class DocNewsTagController extends Controller
{
    private $repository;
    public function __construct(DocNewsTagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docNewsTags'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-news-tag.table', $data)->render();
        }
        return view('doc::doc-news-tag.index', $data);
    }

    public function create()
    {
        return view('doc::doc-news-tag.create');
    }

    public function store(DocNewsTagCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-news-tag.index');
    }

    public function show($id)
    {
        $docNewsTag = $this->repository->find($id);
        if(empty($docNewsTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-news-tag.show', compact('docNewsTag'));
    }

    public function edit($id)
    {
        $docNewsTag = $this->repository->find($id);
        if(empty($docNewsTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-news-tag.update', compact('docNewsTag'));
    }

    public function update(DocNewsTagUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docNewsTag = $this->repository->find($id);
        if(empty($docNewsTag))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docNewsTag);
        session()->flash('success', 'update success');
        return redirect()->route('doc-news-tag.index');
    }

    public function destroy($id)
    {
        $docNewsTag = $this->repository->find($id);
        if(empty($docNewsTag))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
