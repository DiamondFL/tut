<?php

namespace Test\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Test\Models\RgReply;
use Test\Http\Requests\RgReplyCreateRequest;
use Test\Http\Requests\RgReplyUpdateRequest;
use Test\Repositories\RgReplyRepository;
use Illuminate\Http\Request;

class RgReplyController extends Controller
{
    private $repository;
    public function __construct(RgReplyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['rgReplies'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('trg::rg-reply.table', $data)->render();
        }
        return view('trg::rg-reply.index', $data);
    }

    public function create()
    {
        return view('trg::rg-reply.create');
    }

    public function store(RgReplyCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('rg-reply.index');
    }

    public function show($id)
    {
        $rgReply = $this->repository->find($id);
        if(empty($rgReply))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-reply.show', compact('rgReply'));
    }

    public function edit($id)
    {
        $rgReply = $this->repository->find($id);
        if(empty($rgReply))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('trg::rg-reply.update', compact('rgReply'));
    }

    public function update(RgReplyUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $rgReply = $this->repository->find($id);
        if(empty($rgReply))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $rgReply);
        session()->flash('success', 'update success');
        return redirect()->route('rg-reply.index');
    }

    public function destroy($id)
    {
        $rgReply = $this->repository->find($id);
        if(empty($rgReply))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
