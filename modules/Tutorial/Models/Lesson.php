<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lessons';
    public $fillable = [TITLE_COL, INTRO_COL, CONTENT_COL, SECTION_ID_COL, VIEWS_COL, LAST_VIEW_COL, CREATED_BY_COL, UPDATED_BY_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[TITLE_COL])) {
            $query->where(TITLE_COL, $input[TITLE_COL]);
        }
        if (isset($input[INTRO_COL])) {
            $query->where(INTRO_COL, $input[INTRO_COL]);
        }
        if (isset($input[CONTENT_COL])) {
            $query->where(CONTENT_COL, $input[CONTENT_COL]);
        }
        if (isset($input[SECTION_ID_COL])) {
            $query->where(SECTION_ID_COL, $input[SECTION_ID_COL]);
        }
        if (isset($input[VIEWS_COL])) {
            $query->where(VIEWS_COL, $input[VIEWS_COL]);
        }
        if (isset($input[LAST_VIEW_COL])) {
            $query->where(LAST_VIEW_COL, $input[LAST_VIEW_COL]);
        }
        if (isset($input[CREATED_BY_COL])) {
            $query->where(CREATED_BY_COL, $input[CREATED_BY_COL]);
        }
        if (isset($input[UPDATED_BY_COL])) {
            $query->where(UPDATED_BY_COL, $input[UPDATED_BY_COL]);
        }
        if (isset($input[IS_ACTIVE_COL])) {
            $query->where(IS_ACTIVE_COL, $input[IS_ACTIVE_COL]);
        }
        return $query;
    }

    public function section()
    {
        return $this->belongsTo(Section::class, SECTION_ID_COL);
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lessons'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

