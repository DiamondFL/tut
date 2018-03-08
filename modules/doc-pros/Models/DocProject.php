<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocProject extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_projects';
    public $fillable = [NAME_COL, INTRO_COL];

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

    protected $checkbox = [IS_ACTIVE_COL];
}

