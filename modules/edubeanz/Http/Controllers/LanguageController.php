<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/15/2018
 * Time: 3:25 PM
 */

namespace Edubeanz\Http\Controllers;


use App\Constants\Page;
use App\Repositories\VocabularyRepository;
use Illuminate\Http\Request;

class LanguageController
{
    private $repository;

    public function __construct(VocabularyRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getList(Request $request)
    {
        $input = $request->all();
        $input[Page::PER_PAGE] = 8;
        $data['vocabularies'] = $this->repository->myPaginate($input);
        if ($request->ajax()) {
            return view('edu::languages.includes.paginate', $data)->render();
        }
        return view('edu::languages.list', $data);
    }
}