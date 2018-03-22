<?php

namespace Docs\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocLanguage extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_languages';
    public $fillable = [NAME_COL, INTRO_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[NAME_COL])) {
            $query->where(NAME_COL, $input[NAME_COL]);
        }
        if (isset($input[INTRO_COL])) {
            $query->where(INTRO_COL, $input[INTRO_COL]);
        }
        return $query;
    }


    public $fileUpload = [IMAGE_COL => 1];
    protected $pathUpload = [IMAGE_COL => '/images/doc_languages'];
    protected $thumbImage = [
        IMAGE_COL => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

