<?php

namespace Docs\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocExampleTag extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_example_tags';
    public $fillable = [DOC_TAG_ID_COL, DOC_EXAMPLE_ID_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[DOC_TAG_ID_COL])) {
            $query->where(DOC_TAG_ID_COL, $input[DOC_TAG_ID_COL]);
        }
        if (isset($input[DOC_EXAMPLE_ID_COL])) {
            $query->where(DOC_EXAMPLE_ID_COL, $input[DOC_EXAMPLE_ID_COL]);
        }

        return $query;
    }

    protected $checkbox = [IS_ACTIVE_COL];
}

