<?php

namespace App\Http\Controllers;

use App\Models\News;
use Istruct\Facades\InputFa;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $repository;
    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->ajax();
        $data['news'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('news.table', $data)->render();
        }
        return view('news.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', News::class);
        return view('news.create');
    }

    public function store(NewsCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        //dd($input);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('news.index');
    }

    public function show($id)
    {
        $news = $this->repository->find($id);
        if(empty($news))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = $this->repository->find($id);
        if(empty($news))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $news);

        return view('news.update', compact('news'));
    }

    public function update(NewsUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $news = $this->repository->find($id);
        if(empty($news))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $news);
        session()->flash('success', 'update success');
        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $news = $this->repository->find($id);
        if(empty($news))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
