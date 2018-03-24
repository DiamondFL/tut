<?php

namespace Organization\Models;

use Docs\Models\DocLesson;
use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SubCategories extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'sub_categories';
    public $fillable = [NAME_COL, CATEGORY_ID_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[NAME_COL])) {
            $query->where(NAME_COL, $input[NAME_COL]);
        }
        if (isset($input[CATEGORY_ID_COL])) {
            $query->where(CATEGORY_ID_COL, $input[CATEGORY_ID_COL]);
        }
        return $query;
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, CATEGORY_ID_COL);
    }

    public function lessons()
    {
        return $this->hasMany(DocLesson::class, SUB_CATEGORY_ID_COL);
    }

//    public $fileUpload = ['image' => 1];
//    protected $pathUpload = ['image' => '/images/categories'];
//    protected $thumbImage = [
//        'image' => [
//            '/thumbs/' => [
//                [200, 200], [300, 300], [400, 400]
//            ]
//        ]
//    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

