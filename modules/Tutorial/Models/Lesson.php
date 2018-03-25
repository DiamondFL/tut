<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lessons';
    public $fillable = [''];

    public function scopeFilter($query, $input)
    {
        
        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lessons'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

