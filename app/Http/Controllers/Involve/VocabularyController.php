<?php

namespace App\Http\Controllers\Involve;

use Istruct\Facades\InputFa;
use App\Repositories\VocabularyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VocabularyController extends Controller
{
    private $repository;

    public function __construct(VocabularyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function import(Request $request)
    {
        $file = $request->all()[0];
        $this->repository->import($file);
        if ($request->ajax()) {
            return response()->json('Import success');
        }
        session()->flash('success', 'Import success');
        return redirect()->back();
    }

    public function export(Request $request)
    {
        $input = $request->all();
        $this->repository->export($input);
    }

    public function search(Request $request)
    {
        $input = $request->all();
        $data['resultVo'] = $this->repository->myPaginate($input);
        if($request->ajax())
        {
            return view('vocabularies.result', $data)->render();
        }
    }
}
