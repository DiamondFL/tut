<?php

namespace App\Http\Controllers;

use Istruct\Facades\InputFa;
use App\Http\Requests\MultiChoiceCreateRequest;
use App\Http\Requests\MultiChoiceUpdateRequest;
use App\Repositories\MultiChoiceRepository;
use Illuminate\Http\Request;

class MultiChoiceController extends Controller
{
    private $repository;
    public function __construct(MultiChoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['multi_choices'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('multi_choices.table', $data)->render();
        }
        return view('multi_choices.index', $data);
    }

    public function create()
    {
        //$this->authorize('create', $this->repository->makeModel());
        return view('multi_choices.create');
    }

    public function store(MultiChoiceCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('multi_choices.index');
    }

    public function show($id)
    {
        $multi_choices = $this->repository->find($id);
        if(empty($multi_choices))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('multi_choices.show', compact('multi_choices'));
    }

    public function edit($id)
    {
        $multi_choices = $this->repository->find($id);
        if(empty($multi_choices))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        //$this->authorize('update', $multi_choices);

        return view('multi_choices.update', compact('multi_choices'));
    }

    public function update(MultiChoiceUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $multi_choices = $this->repository->find($id);
        if(empty($multi_choices))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $multi_choices);
        session()->flash('success', 'update success');
        return redirect()->route('multi_choices.index');
    }

    public function destroy($id)
    {
        $multi_choices = $this->repository->find($id);
        if(empty($multi_choices))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
