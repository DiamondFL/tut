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
    public $fillable = [TITLE_COL, INTRO_COL, CONTENT_COL, VIEWS_COL, LAST_VIEW_COL, CREATED_BY_COL, UPDATED_BY_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[TITLE_COL])) {
            $query->where($this->table . '.title', 'LIKE', '%' . $input[TITLE_COL] . '%');
        }
        if (isset($input[INTRO_COL])) {
            $query->where($this->table . '.intro', 'LIKE', '%' . $input[INTRO_COL] . '%');
        }
        if (isset($input[CONTENT_COL])) {
            $query->where($this->table . '.content', 'LIKE', '%' . $input[CONTENT_COL] . '%');
        }
        if (isset($input[VIEWS_COL])) {
            $query->where($this->table . '.views', $input[VIEWS_COL]);
        }
        if (isset($input[LAST_VIEW_COL])) {
            $query->where($this->table . '.last_view', $input[LAST_VIEW_COL]);
        }
        if (isset($input[CREATED_BY_COL])) {
            $query->where($this->table . '.created_by', $input[CREATED_BY_COL]);
        }
        if (isset($input[UPDATED_BY_COL])) {
            $query->where($this->table . '.updated_by', $input[UPDATED_BY_COL]);
        }
        return $query;
    }

    public function tags()
    {
        return $this->belongsToMany(DocTag::class, DOC_EXAMPLE_TAGS_TB, DOC_EXAMPLE_ID_COL, DOC_TAG_ID_COL);
    }
}

