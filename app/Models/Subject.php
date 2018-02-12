<?php

namespace App\Models;;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subject extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = SUBJECTS_TB;
    public $fillable = [NAME_COL, DESCRIPTION_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/subjects'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = [IS_ACTIVE_COL];
}

