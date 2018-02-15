<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/15/2018
 * Time: 4:54 PM
 */

namespace Edubeanz\Http\Controllers;

use DocPros\Repositories\DocExampleRepository;
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
        $data['vocabularies'] = $this->repository->myPaginate($input);
        if ($request->ajax()) {
            return view('edu::languages.includes.paginate', $data)->render();
        }
        return view('edu::languages.list', $data);
    }

    public function getDetail(Request $request)
    {

    }
}