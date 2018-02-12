<?php

namespace _namespace_\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class _class_ extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = '_table_';
    public $fillable = _fillable_;

    public function scopeFilter($query, $input)
    {
        _filter_
        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/_table_'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

