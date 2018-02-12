<?php

namespace App\Models;
;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MultiChoice extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = MULTI_CHOICES_TB;
    public $fillable = [
        QUESTION_COL, REPLY1_COL, REPLY2_COL, REPLY3_COL, REPLY4_COL,
        REPLY5_COL, ANSWER_COL, LEVEL_COL, KNOWLEDGE_COL, PROFESSIONAL_COL, SUBJECT_ID_COL
    ];

    public function scopeFilter($query, $input)
    {
        if (isset($input[QUESTION_COL]) && $input[QUESTION_COL] !== '') {
            $query->where(QUESTION_COL, 'LIKE', '%' . trim($input[QUESTION_COL]) . '%');
        }
        if (isset($input[ANSWER_COL]) && $input[ANSWER_COL] !== '') {
            $query->where(ANSWER_COL, $input[ANSWER_COL]);
        }
        if (isset($input[LEVEL_COL])) {
            $query->where(LEVEL_COL, $input[LEVEL_COL]);
        }
        if (isset($input[KNOWLEDGE_COL])) {
            $query->where(KNOWLEDGE_COL, $input[KNOWLEDGE_COL]);
        }
        if (isset($input[SUBJECT_ID_COL])) {
            $query->where(SUBJECT_ID_COL, $input[SUBJECT_ID_COL]);
        }
        if (isset($input[PROFESSIONAL_COL])) {
            $query->where(PROFESSIONAL_COL, $input[PROFESSIONAL_COL]);
        }
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/multi_choices'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

