<?php

namespace Ush\Product\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UshColorProduct extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'ush_color_products';
    public $fillable = ['ush_product_id', 'img'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['ush_product_id'])) {
                $query->where('ush_product_id', $input['ush_product_id']); 
                }
if(isset($input['img'])) {
                $query->where('img', $input['img']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/ush_color_products'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

