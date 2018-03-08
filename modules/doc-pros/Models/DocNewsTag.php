<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocNewsTag extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_news_tags';
    public $fillable = [DOC_NEWS_ID_COL, DOC_TAG_ID_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[DOC_NEWS_ID_COL])) {
            $query->where(DOC_NEWS_ID_COL, $input[DOC_NEWS_ID_COL]);
        }
        if (isset($input[DOC_TAG_ID_COL])) {
            $query->where(DOC_TAG_ID_COL, $input[DOC_TAG_ID_COL]);
        }
        return $query;
    }

    public $fileUpload = [IMAGE_COL => 1];
    protected $pathUpload = [IMAGE_COL => '/images/doc_news_tags'];
    protected $thumbImage = [
        IMAGE_COL => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

