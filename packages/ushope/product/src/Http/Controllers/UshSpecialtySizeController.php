<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshSpecialtySize;
use Ush\Product\Http\Requests\UshSpecialtySizeCreateRequest;
use Ush\Product\Http\Requests\UshSpecialtySizeUpdateRequest;
use Ush\Product\Repositories\UshSpecialtySizeRepository;
use Illuminate\Http\Request;

class UshSpecialtySizeController extends Controller
{
    private $repository;
    public function __construct(UshSpecialtySizeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushSpecialtySizes'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-specialty-size.table', $data)->render();
        }
        return view('ush-p::ush-specialty-size.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-specialty-size.create');
    }

    public function store(UshSpecialtySizeCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-specialty-size.index');
    }

    public function show($id)
    {
        $ushSpecialtySize = $this->repository->find($id);
        if(empty($ushSpecialtySize))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-specialty-size.show', compact('ushSpecialtySize'));
    }

    public function edit($id)
    {
        $ushSpecialtySize = $this->repository->find($id);
        if(empty($ushSpecialtySize))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-specialty-size.update', compact('ushSpecialtySize'));
    }

    public function update(UshSpecialtySizeUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushSpecialtySize = $this->repository->find($id);
        if(empty($ushSpecialtySize))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushSpecialtySize);
        session()->flash('success', 'update success');
        return redirect()->route('ush-specialty-size.index');
    }

    public function destroy($id)
    {
        $ushSpecialtySize = $this->repository->find($id);
        if(empty($ushSpecialtySize))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
