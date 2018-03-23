<?php

namespace Docs\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Organization\Models\SubCategory;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class DocLesson extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_lessons';
    public $fillable = [TITLE_COL, INTRO_COL, CONTENT_COL, SUB_CATEGORY_ID_COL, VIEWS_COL, LAST_VIEW_COL, CREATED_BY_COL, UPDATED_BY_COL];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, SUB_CATEGORY_ID_COL);
    }

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
        if (isset($input[SUBJECT_ID_COL])) {
            $query->where(SUBJECT_ID_COL, $input[SUBJECT_ID_COL]);
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
        return $query;
    }

    public $fileUpload = [IMAGE_COL => 1];
    protected $pathUpload = [IMAGE_COL => '/images/doc_lessons'];
    protected $thumbImage = [
        IMAGE_COL => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

