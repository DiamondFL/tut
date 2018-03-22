<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/11/2018
 * Time: 7:42 PM
 */

namespace Docs\Http\Controllers\Attractive;

use Docs\Repositories\DocExampleRepository;
use Illuminate\Http\Request;

class ExampleController
{
    private $repository;
    public function __construct(DocExampleRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getByTags(Request $request)
    {
        $input = $request->all();
        $data = $this->repository->paginateByTags($input);
        return response()->json($data);
    }
}