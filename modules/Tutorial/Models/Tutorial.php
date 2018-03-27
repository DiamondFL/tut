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
    public $fillable = ['name', 'img', 'is_active'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['name'])) {
                $query->where('name', $input['name']); 
                }
if(isset($input['img'])) {
                $query->where('img', $input['img']); 
                }
if(isset($input['is_active'])) {
                $query->where('is_active', $input['is_active']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/tutorials'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

