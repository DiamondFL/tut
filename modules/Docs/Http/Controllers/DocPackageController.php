<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Docs\Models\DocPackage;
use Docs\Http\Requests\DocPackageCreateRequest;
use Docs\Http\Requests\DocPackageUpdateRequest;
use Docs\Repositories\DocPackageRepository;
use Illuminate\Http\Request;

class DocPackageController extends Controller
{
    private $repository;
    public function __construct(DocPackageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docPackages'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-package.table', $data)->render();
        }
        return view('doc::doc-package.index', $data);
    }

    public function create()
    {
        return view('doc::doc-package.create');
    }

    public function store(DocPackageCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-package.index');
    }

    public function show($id)
    {
        $docPackage = $this->repository->find($id);
        if(empty($docPackage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-package.show', compact('docPackage'));
    }

    public function edit($id)
    {
        $docPackage = $this->repository->find($id);
        if(empty($docPackage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-package.update', compact('docPackage'));
    }

    public function update(DocPackageUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docPackage = $this->repository->find($id);
        if(empty($docPackage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docPackage);
        session()->flash('success', 'update success');
        return redirect()->route('doc-package.index');
    }

    public function destroy($id)
    {
        $docPackage = $this->repository->find($id);
        if(empty($docPackage))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
