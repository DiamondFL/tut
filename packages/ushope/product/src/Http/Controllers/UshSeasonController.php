<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshSeason;
use Ush\Product\Http\Requests\UshSeasonCreateRequest;
use Ush\Product\Http\Requests\UshSeasonUpdateRequest;
use Ush\Product\Repositories\UshSeasonRepository;
use Illuminate\Http\Request;

class UshSeasonController extends Controller
{
    private $repository;
    public function __construct(UshSeasonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushSeasons'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-season.table', $data)->render();
        }
        return view('ush-p::ush-season.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-season.create');
    }

    public function store(UshSeasonCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ushSeasons.index');
    }

    public function show($id)
    {
        $ushSeason = $this->repository->find($id);
        if(empty($ushSeason))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-season.show', compact('ushSeason'));
    }

    public function edit($id)
    {
        $ushSeason = $this->repository->find($id);
        if(empty($ushSeason))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-season.update', compact('ushSeason'));
    }

    public function update(UshSeasonUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushSeason = $this->repository->find($id);
        if(empty($ushSeason))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushSeason);
        session()->flash('success', 'update success');
        return redirect()->route('ushSeasons.index');
    }

    public function destroy($id)
    {
        $ushSeason = $this->repository->find($id);
        if(empty($ushSeason))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
