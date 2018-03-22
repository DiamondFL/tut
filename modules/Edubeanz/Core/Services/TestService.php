<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 3/22/18
 * Time: 10:55 AM
 */

namespace Edubeanz\Core\Services;

use Edubeanz\Plan\Events\MarkEvent;
use App\Repositories\MultiChoiceRepository;
use Illuminate\Http\Request;

class TestService
{

    private $repository;

    public function __construct(MultiChoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function countList($input)
    {
        $count = $this->repository->filterCount($input);
        return ceil((int)$count / $this->getPerPage());
    }

    public function marking($request)
    {
        $replies = $request->except(['_token', 'page']);
        $options = $this->getOptions($request);
        $questions = $this->repository->myPaginate($options);
        $result = $this->mark($questions, $replies);
        event(new MarkEvent($result[SCORE_COL]));
        return array_merge($result, compact('questions', 'replies'));
    }

    public function mark($questions, $input)
    {
        $score = 0;
        $exactly = [];
        foreach ($questions as $question) {
            $answerKey = 'answer' . $question->id;
            if (isset($input[$answerKey])) {
                if($this->check($question->answer, $input[$answerKey]) === true) {
                    ++$score;
                    $exactly[$answerKey] = true;
                } else {
                    $exactly[$answerKey] = false;
                }
            }
        }
        return compact('score', 'exactly');
    }

    private function check($answer, $reply)
    {
        if ((int) trim($answer) > 5) {
            $reply = implode('', $reply);
            if ($answer == $reply) {
              return true;
            }
        } else {
            if ($answer == $reply) {
                return true;
            }
        }
        return false;
    }

    public function getTest($input)
    {
        $input[PER_PAGE] = $this->getPerPage();
        return $this->repository->myPaginate($input);
    }

    private function getOptions($request)
    {
        $options = $request->only(['level', 'knowledge', 'professional']);
        $options[PER_PAGE] = $this->getPerPage();
        return $options;
    }

    private function getPerPage()
    {
        return config('multi-choice.paginate.test');
    }
}