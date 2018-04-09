<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LessonComment extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lesson_comments';
    public $fillable = [LESSON_ID_COL, CONTENT_COL, CREATED_BY_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[LESSON_ID_COL])) {
            $query->where(LESSON_ID_COL, $input[LESSON_ID_COL]);
        }
        if (isset($input[CONTENT_COL])) {
            $query->where(CONTENT_COL, $input[CONTENT_COL]);
        }
        if (isset($input[CREATED_BY_COL])) {
            $query->where(CREATED_BY_COL, $input[CREATED_BY_COL]);
        }
        if (isset($input[IS_ACTIVE_COL])) {
            $query->where(IS_ACTIVE_COL, $input[IS_ACTIVE_COL]);
        }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lesson_comments'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

