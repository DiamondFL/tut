<?php

namespace App\Http\Controllers\Involve;

use App\Constants\Page;
use App\Repositories\MultiChoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MultiChoiceController extends Controller
{
    private $repository;

    public function __construct(MultiChoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getListTest(Request $request)
    {
        $input = $request->all();
        $data ['count'] = $this->repository->countList($input);
        if($request->ajax())
        {
            return view('multi-choices.is-lists', $data)->render();
        }
        return view('multi-choices.list', $data);
    }

    public function test(Request $request)
    {
        $input = $request->all();
        $input['questions'] = $this->repository->getTest($input);
        $input['repList'] = [ 1=> 'reply1',  2=> 'reply2',  3=> 'reply3',  4=> 'reply4',  5=> 'reply5' ];
        return view('multi-choices.test', $input);
    }

    public function marking(Request $request)
    {
        $input = $request->all();
        $options = $this->getOptions($request);
        $questions = $this->repository->myPaginate($options);
        $score = $this->repository->mark($questions, $input);
        $message = 'Số câu bạn trả lời đúng là: ' . $score . '/' . count($questions);
        session()->flash('global', $message);
        $repList = [ 1=> 'reply1',  2=> 'reply2',  3=> 'reply3',  4=> 'reply4',  5=> 'reply5' ];
        return view('multi-choices.marked', compact('questions'))
            ->with(compact('repList'))
            ->with('replies', $input);
    }

    private function getOptions($request)
    {
        $options = $request->only(['level', 'knowledge', 'professional']);
        $options[Page::PER_PAGE] = config('multi-choice.paginate.test');
        return $options;
    }

    public function import(Request $request)
    {
        set_time_limit(999);
        $file = $request->all()[0];
        $this->repository->import($file);
        return response()->json('Import Success');
    }
}
