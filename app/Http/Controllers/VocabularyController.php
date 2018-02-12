<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Events\ImportLogEvent;
use Istruct\Facades\FormatFa;
use App\Http\Requests\VocabularyCreateRequest;
use App\Http\Requests\VocabularyUpdateRequest;

use App\Repositories\VocabularyRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VocabularyController extends Controller
{
    private $repository;

    public function __construct(VocabularyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $data['vocabularies'] = $this->repository->myPaginate($input);
        if ($request->ajax()) {
            return view('vocabularies.table', $data)->render();
        }
        return view('vocabularies.index', $data);
    }

    public function create()
    {
        return view('vocabularies.create');
    }

    public function store(VocabularyCreateRequest $request)
    {
        $input = $request->all();
        $this->repository->store($input);
        return redirect(route('vocabularies.index'));
    }

    public function show($id)
    {
        $vocabulary = $this->repository->find($id);
        if (empty($vocabulary)) {
            session()->flash('error', 'Not Found');
            return redirect()->back();
        }
        return view('vocabularies.show', compact('vocabulary'));
    }

    public function edit($id)
    {
        $vocabulary = $this->repository->find($id);
        if (empty($vocabulary)) {
            session()->flash('error', 'Not Found');
            return redirect()->back();
        }
        return view('vocabularies.update', compact('vocabulary'));
    }

    public function update(VocabularyUpdateRequest $request, $id)
    {
        $input = $request->all();
        $vocabulary = $this->repository->find($id);
        if (empty($vocabulary)) {
            session()->flash('error', 'Not Found');
            return redirect()->back();
        }
        $this->repository->change($input, $vocabulary);
        return redirect(route('vocabularies.index'));
    }

    public function destroy($id)
    {
        $vocabulary = $this->repository->find($id);
        if (empty($vocabulary)) {
            session()->flash('error', 'Not Found');
            return redirect()->back();
        }
        $this->repository->delete($id);
    }
}
