<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $repository;
    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['tags'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tags.table', $data)->render();
        }
        return view('tags.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', $this->repository->makeModel());
        return view('tags.create');
    }

    public function store(TagCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tags = $this->repository->find($id);
        if(empty($tags))
        {
            session()->flash('error', 'not found');
            return redirect()->back();
        }
        return view('tags.show', compact('tags'));
    }

    public function edit($id)
    {
        $tags = $this->repository->find($id);
        if(empty($tags))
        {
            session()->flash('error', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $tags);

        return view('tags.update', compact('tags'));
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $tags = $this->repository->find($id);
        if(empty($tags))
        {
            session()->flash('error', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $tags);
        session()->flash('success', 'update success');
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tags = $this->repository->find($id);
        if(empty($tags))
        {
            session()->flash('error', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
