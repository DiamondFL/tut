<?php

namespace Docs\Http\Controllers;

use App\Http\Controllers\Controller;
use Istruct\Facades\InputFa;
use Docs\Models\DocLanguage;
use Docs\Http\Requests\DocLanguageCreateRequest;
use Docs\Http\Requests\DocLanguageUpdateRequest;
use Docs\Repositories\DocLanguageRepository;
use Illuminate\Http\Request;

class DocLanguageController extends Controller
{
    private $repository;
    public function __construct(DocLanguageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = InputFa::normalization($request);
        $data['docLanguages'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('doc::doc-language.table', $data)->render();
        }
        return view('doc::doc-language.index', $data);
    }

    public function create()
    {
        return view('doc::doc-language.create');
    }

    public function store(DocLanguageCreateRequest $request)
    {
        $input = InputFa::normalization($request);
        $this->repository->store($input);
        session()->flash('success', 'create success');
        return redirect()->route('doc-language.index');
    }

    public function show($id)
    {
        $docLanguage = $this->repository->find($id);
        if(empty($docLanguage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-language.show', compact('docLanguage'));
    }

    public function edit($id)
    {
        $docLanguage = $this->repository->find($id);
        if(empty($docLanguage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        return view('doc::doc-language.update', compact('docLanguage'));
    }

    public function update(DocLanguageUpdateRequest $request, $id)
    {
        $input = InputFa::normalization($request);
        $docLanguage = $this->repository->find($id);
        if(empty($docLanguage))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $this->repository->change($input, $docLanguage);
        session()->flash('success', 'update success');
        return redirect()->route('doc-language.index');
    }

    public function destroy($id)
    {
        $docLanguage = $this->repository->find($id);
        if(empty($docLanguage))
        {
            session()->flash('err', 'not found');
        }
        $this->repository->delete($id);
        session()->flash('success', 'delete success');
        return redirect()->back();
    }
}
