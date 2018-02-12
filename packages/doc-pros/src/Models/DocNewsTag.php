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
    public $fillable = ['doc_news_id', 'doc_tag_id'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['doc_news_id'])) {
                $query->where('doc_news_id', $input['doc_news_id']); 
                }
if(isset($input['doc_tag_id'])) {
                $query->where('doc_tag_id', $input['doc_tag_id']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/doc_news_tags'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

