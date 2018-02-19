<?php

namespace Ush\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UshGroup extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'ush_groups';
    public $fillable = ['name'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['name'])) {
                $query->where('name', $input['name']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/ush_groups'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

