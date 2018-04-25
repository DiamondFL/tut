<?php

namespace Tutorial\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Tutorial\Models\SectionResult;
use Tutorial\Http\Requests\SectionResultCreateRequest;
use Tutorial\Http\Requests\SectionResultUpdateRequest;
use Tutorial\Repositories\SectionResultRepository;
use Illuminate\Http\Request;

class SectionResultController extends Controller
{
    private $repository;
    public function __construct(SectionResultRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['sectionResults'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('tut::section-result.table', $data)->render();
        }
        return view('tut::section-result.index', $data);
    }

    public function create()
    {
        return view('tut::section-result.create');
    }

    public function store(SectionResultCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('section-result.index');
    }

    public function show($id)
    {
        $sectionResult = $this->repository->find($id);
        if(empty($sectionResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::section-result.show', compact('sectionResult'));
    }

    public function edit($id)
    {
        $sectionResult = $this->repository->find($id);
        if(empty($sectionResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('tut::section-result.update', compact('sectionResult'));
    }

    public function update(SectionResultUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $sectionResult = $this->repository->find($id);
        if(empty($sectionResult))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $sectionResult);
        session()->flash('success', 'update success');
        if(isset($input['is_back']))
        {
            return redirect()->back();
        }
        return redirect()->route('section-result.index');
    }

    public function destroy($id)
    {
        $sectionResult = $this->repository->find($id);
        if(empty($sectionResult))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
