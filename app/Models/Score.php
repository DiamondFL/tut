<?php

namespace App\Models;;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Score extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = SCORES_TB;
    public $fillable = [USER_ID_COL, SCORE_COL, NO_ANSWER_COL, NO_QUESTION_COL];

    public function scopeFilter($query, $input)
    {
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/scores'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

