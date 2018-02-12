<?php

namespace App\Models;;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tag extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = TAGS_TB;
    public $fillable = [NAME_COL];

    public function scopeFilter($query, $input)
    {
        if(isset($input[NAME_COL]) && ($name = trim($input[NAME_COL])) !== '')
        {
            $query->where(NAME_COL, 'LIKE', $name . '%');
        }
        return $query;
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/tags'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
    public $timestamps = false;
}

