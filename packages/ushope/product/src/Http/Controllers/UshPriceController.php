<?php

namespace Ush\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Ush\Product\Models\UshPrice;
use Ush\Product\Http\Requests\UshPriceCreateRequest;
use Ush\Product\Http\Requests\UshPriceUpdateRequest;
use Ush\Product\Repositories\UshPriceRepository;
use Illuminate\Http\Request;

class UshPriceController extends Controller
{
    private $repository;
    public function __construct(UshPriceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['ushPrices'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('ush-p::ush-price.table', $data)->render();
        }
        return view('ush-p::ush-price.index', $data);
    }

    public function create()
    {
        return view('ush-p::ush-price.create');
    }

    public function store(UshPriceCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('ush-price.index');
    }

    public function show($id)
    {
        $ushPrice = $this->repository->find($id);
        if(empty($ushPrice))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-price.show', compact('ushPrice'));
    }

    public function edit($id)
    {
        $ushPrice = $this->repository->find($id);
        if(empty($ushPrice))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('ush-p::ush-price.update', compact('ushPrice'));
    }

    public function update(UshPriceUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $ushPrice = $this->repository->find($id);
        if(empty($ushPrice))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $ushPrice);
        session()->flash('success', 'update success');
        return redirect()->route('ush-price.index');
    }

    public function destroy($id)
    {
        $ushPrice = $this->repository->find($id);
        if(empty($ushPrice))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
