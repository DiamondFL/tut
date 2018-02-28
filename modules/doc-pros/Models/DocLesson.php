<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ush\Models\UshSubCategory;

class DocLesson extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_lessons';
    public $fillable = ['title', 'intro', 'content', 'sub_category_id', 'views', 'last_view', 'created_by', 'updated_by'];

    public function subCategory()
    {
        return $this->belongsTo(UshSubCategory::class, 'sub_category_id');
    }

    public function scopeFilter($query, $input)
    {
        if (isset($input['title'])) {
            $query->where('title', $input['title']);
        }
        if (isset($input['intro'])) {
            $query->where('intro', $input['intro']);
        }
        if (isset($input['content'])) {
            $query->where('content', $input['content']);
        }
        if (isset($input['sub_category_id'])) {
            $query->where('sub_category_id', $input['sub_category_id']);
        }
        if (isset($input['views'])) {
            $query->where('views', $input['views']);
        }
        if (isset($input['last_view'])) {
            $query->where('last_view', $input['last_view']);
        }
        if (isset($input['created_by'])) {
            $query->where('created_by', $input['created_by']);
        }
        if (isset($input['updated_by'])) {
            $query->where('updated_by', $input['updated_by']);
        }
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/doc_lessons'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

