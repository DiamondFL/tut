<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/14/2018
 * Time: 10:12 PM
 */

namespace Edubeanz\Http\Controllers;

use Edubeanz\Core\Services\TestService;
use Illuminate\Http\Request;

class TestController
{
    private $testService;

    public function __construct(TestService $testService)
    {

        $this->testService = $testService;
    }

    public function getList(Request $request)
    {
        $input = $request->all();
        $data ['count'] = $this->testService->countList($input);
        if($request->ajax())
        {
            return view('edu::tests.includes.list-unit', $data)->render();
        }
        return view('edu::tests.list', $data);
    }
    public function doing(Request $request) {
        $input = $request->all();
        $input['questions'] = $this->testService->getTest($input);
        return view('edu::tests.doing', $input);
    }

    public function marking(Request $request)
    {
        try {
            $data = $this->testService->marking($request);
            $message = 'Số câu bạn trả lời đúng là: ' . $data['score'] . '/' . count($data['questions']);
            session()->flash('global', $message);
            return view('edu::tests.marked', $data);
        } catch (\Exception $exception) {
            session()->flash(ERROR, 500);
            return redirect()->back();
        }
    }
}