<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LessonTest extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lesson_tests';
    public $fillable = [LESSON_ID_COL, QUESTION_COL, REPLY1_COL, REPLY2_COL, REPLY3_COL, REPLY4_COL, ANSWER_COL,
        IS_ACTIVE_COL, CREATED_BY_COL, UPDATED_BY_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[LESSON_ID_COL])) {
            $query->where(LESSON_ID_COL, $input[LESSON_ID_COL]);
        }
        if (isset($input[QUESTION_COL])) {
            $query->where(QUESTION_COL, $input[QUESTION_COL]);
        }
        if (isset($input[REPLY1_COL])) {
            $query->where(REPLY1_COL, $input[REPLY1_COL]);
        }
        if (isset($input[REPLY2_COL])) {
            $query->where(REPLY2_COL, $input[REPLY2_COL]);
        }
        if (isset($input[REPLY3_COL])) {
            $query->where(REPLY3_COL, $input[REPLY3_COL]);
        }
        if (isset($input[REPLY4_COL])) {
            $query->where(REPLY4_COL, $input[REPLY4_COL]);
        }
        if (isset($input[ANSWER_COL])) {
            $query->where(ANSWER_COL, $input[ANSWER_COL]);
        }
        if (isset($input[IS_ACTIVE_COL])) {
            $query->where(IS_ACTIVE_COL, $input[IS_ACTIVE_COL]);
        }
        if (isset($input[CREATED_BY_COL])) {
            $query->where(CREATED_BY_COL, $input[CREATED_BY_COL]);
        }
        if (isset($input[UPDATED_BY_COL])) {
            $query->where(UPDATED_BY_COL, $input[UPDATED_BY_COL]);
        }
        return $query;
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, LESSON_ID_COL);
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lesson_tests'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

