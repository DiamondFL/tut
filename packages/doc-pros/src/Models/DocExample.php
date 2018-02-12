<?php

namespace DocPros\Models;

use App\Models\Tag;
use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocExample extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;
    public $table = DOC_EXAMPLES_TB;
    public $fillable = ['title', 'intro', 'content', 'views', 'last_view', 'created_by', 'updated_by'];

    public function scopeFilter($query, $input)
    {
        if (isset($input['title'])) {
            $query->where($this->table . '.title', 'LIKE', '%' . $input['title'] . '%');
        }
        if (isset($input['intro'])) {
            $query->where($this->table . '.intro', 'LIKE', '%' . $input['intro'] . '%');
        }
        if (isset($input['content'])) {
            $query->where($this->table . '.content', 'LIKE', '%' . $input['content'] . '%');
        }
        if (isset($input['views'])) {
            $query->where($this->table . '.views', $input['views']);
        }
        if (isset($input['last_view'])) {
            $query->where($this->table . '.last_view', $input['last_view']);
        }
        if (isset($input['created_by'])) {
            $query->where($this->table . '.created_by', $input['created_by']);
        }
        if (isset($input['updated_by'])) {
            $query->where($this->table . '.updated_by', $input['updated_by']);
        }
        return $query;
    }

    public function tags()
    {
        return $this->belongsToMany(DocTag::class, DOC_EXAMPLE_TAGS_TB, DOC_EXAMPLE_ID_COL, DOC_TAG_ID_COL);
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/doc_examples'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

