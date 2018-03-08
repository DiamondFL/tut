<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocTag extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_tags';
    public $fillable = [NAME_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[NAME_COL])) {
            $query->where(NAME_COL, $input[NAME_COL]);
        }
        return $query;
    }

    protected $checkbox = [IS_ACTIVE_COL];
}

