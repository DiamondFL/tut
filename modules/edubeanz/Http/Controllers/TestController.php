<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/14/2018
 * Time: 10:12 PM
 */

namespace Edubeanz\Http\Controllers;


use App\Repositories\MultiChoiceRepositoryEloquent;
use Illuminate\Http\Request;

class TestController
{
    private $repository;

    public function __construct(MultiChoiceRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function getList(Request $request)
    {
        $input = $request->all();
        $data ['count'] = $this->repository->countList($input);
        if($request->ajax())
        {
            return view('edu::tests.includes.list-unit', $data)->render();
        }
        return view('edu::tests.list', $data);
    }
    public function doing(Request $request) {
        $input = $request->all();
        $input['questions'] = $this->repository->getTest($input);
        return view('edu::tests.doing', $input);
    }

    public function marking(Request $request)
    {
        $input = $request->all();
        $options = $this->getOptions($request);
        $questions = $this->repository->myPaginate($options);
        $score = $this->repository->mark($questions, $input);
        $message = 'Số câu bạn trả lời đúng là: ' . $score . '/' . count($questions);
        session()->flash('global', $message);
        return view('edu::tests.marked', compact('questions'))
            ->with('replies', $input);
    }

    private function getOptions($request)
    {
        $options = $request->only(['level', 'knowledge', 'professional']);
        $options[PER_PAGE] = config('multi-choice.paginate.test');
        return $options;
    }
}