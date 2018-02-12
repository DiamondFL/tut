<?php

namespace Ush\Product\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UshColor extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'ush_colors';
    public $fillable = ['code', 'icon'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['code'])) {
                $query->where('code', $input['code']); 
                }
if(isset($input['icon'])) {
                $query->where('icon', $input['icon']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/ush_colors'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

