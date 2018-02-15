<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocExampleTag extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_example_tags';
    public $fillable = ['doc_tag_id', 'doc_example_id'];

    public function scopeFilter($query, $input)
    {
        if (isset($input['doc_tag_id'])) {
            $query->where('doc_tag_id', $input['doc_tag_id']);
        }
        if (isset($input['doc_example_id'])) {
            $query->where('doc_example_id', $input['doc_example_id']);
        }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/doc_example_tags'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

