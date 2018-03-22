<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/15/2018
 * Time: 4:54 PM
 */

namespace Edubeanz\Http\Controllers;

use Docs\Repositories\DocExampleRepository;
use Illuminate\Http\Request;

class ExampleController
{
    private $repository;

    public function __construct(DocExampleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getList(Request $request)
    {
        $input = $request->all();
        $data['examples'] = $this->repository->myPaginate($input);
        if ($request->ajax()) {
            return view('edu::examples.includes.paginate', $data)->render();
        }
        return view('edu::examples.list', $data);
    }

    public function getDetail($id, Request $request)
    {
        $docExample = $this->repository->find($id);
        if(empty($docExample))
        {
            session()->flash('err', 'not found');
            return redirect()->back();
        }
        $docExample->views = $docExample->views + 1;
        $docExample->last_view = date('Y-m-d H:s:i');
        $docExample->save();
        $tagList = $docExample->tags->pluck('name', 'id')->toArray();
        return view('edu::examples.detail', compact('docExample', 'tagList'));
    }
}