<?php

namespace App\Repositories;

use Istruct\MultiInheritance\RepositoriesTrait;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\MultiChoice;

/**
 * Class NewsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MultiChoiceRepositoryEloquent extends BaseRepository implements MultiChoiceRepository
{
    use RepositoriesTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MultiChoice::class;
    }

    public function myPaginate($input)
    {
        isset($input[PER_PAGE]) ?: $input[PER_PAGE] = config('multi-choice.paginate.table');
        return $this->makeModel()
            ->filter($input)
            ->paginate($input[PER_PAGE]);

    }

    public function store($input)
    {
        $input = $this->standardized($input, $this->makeModel());
        $this->create($input);
    }

    public function change($input, $data)
    {
        $input = $this->standardized($input, $data);
        $this->update($input, $data->id);
    }

    public function import($file)
    {
        set_time_limit(9999);
        $path = $this->makeModel()->uploadImport($file);
        $this->importing($path);
    }

    public function mark($questions, $input)
    {
        $score = 0;
        foreach ($questions as $question) {
            $answerKey = 'answer' . $question->id;
            if (isset($input[$answerKey])) {
                if (trim($question->answer) > 5) {
                    if ($question->answer == $input[$answerKey] = implode('', $input[$answerKey])) {
                        ++$score;
                    }
                } else {
                    if ($question->answer == $input[$answerKey]) {
                        ++$score;
                    }
                }
            }
        }
        return $score;
    }

    public function countList($input)
    {
        $count = $this->makeModel()
            ->filter($input)
            ->count();
        return ceil((int)$count / config('multi-choice.paginate.test'));
    }

    public function getTest($input)
    {
        return $this->makeModel()
            ->filter($input)
            ->paginate(config('multi-choice.paginate.test'));
    }

    private function standardized($input, $data)
    {
        $input = $data->uploads($input);
        return $data->checkbox($input);
    }

    public function destroy($data)
    {
        // TODO: Implement remove() method.
    }

    public function importing($path)
    {
        Excel::load($path, function ($reader) {
            $results = $reader->toArray();
            $subject_id = request()->subject_id;
            if($subject_id == 7)
            {
                foreach ($results as $value) {
                    $value['subject_id'] = $subject_id;
                    $this->create($value);
                }
            } else {
                foreach ($results as $value) {
                    $value['subject_id'] = $subject_id;
                    $value = $this->setInput($value);
                    $this->create($value);
                }
            }
        });
        unlink($path);
    }

    private function setInput($value)
    {
        $value['professional'] = config('multi-choice.professional')[$value['professional']];
        $value['knowledge'] = config('multi-choice.knowledge')[$value['knowledge']];
        return $value;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
