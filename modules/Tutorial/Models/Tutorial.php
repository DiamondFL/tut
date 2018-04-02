<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tutorial extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'tutorials';
    public $fillable = [NAME_COL, IMG_COL, IS_ACTIVE_COL, DESCRIPTION_COL];

    public function scopeFilter($query, $input)
    {
        if (isset($input[NAME_COL])) {
            $query->where(NAME_COL, $input[NAME_COL]);
        }
        if (isset($input[IS_ACTIVE_COL])) {
            $query->where(IS_ACTIVE_COL, $input[IS_ACTIVE_COL]);
        }
        return $query;
    }

    public function sections()
    {
        return $this->hasMany(Section::class, TUTORIAL_ID_COL);
    }

    public $fileUpload = [IMG_COL => 1];
    protected $pathUpload = [IMG_COL => '/images/tutorials'];
    protected $thumbImage = [
        IMG_COL => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

