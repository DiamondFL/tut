<?php

namespace Ush\Product\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UshProduct extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'ush_products';
    public $fillable = ['name', 'rate', 'no_rate', 'ush_category_id', 'ush_group_id', 'ush_seasonal_id', 'ush_feature_id', 'ush_material_id', 'ush_brand_id', 'ush_weight_id', 'ush_price_id', 'ush_fit_id', 'ush_specialty_size_id', 'img', 'img_plus', 'price', 'minimum_order', 'items', 'content'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['name'])) {
                $query->where('name', $input['name']); 
                }
if(isset($input['rate'])) {
                $query->where('rate', $input['rate']); 
                }
if(isset($input['no_rate'])) {
                $query->where('no_rate', $input['no_rate']); 
                }
if(isset($input['ush_category_id'])) {
                $query->where('ush_category_id', $input['ush_category_id']); 
                }
if(isset($input['ush_group_id'])) {
                $query->where('ush_group_id', $input['ush_group_id']); 
                }
if(isset($input['ush_seasonal_id'])) {
                $query->where('ush_seasonal_id', $input['ush_seasonal_id']); 
                }
if(isset($input['ush_feature_id'])) {
                $query->where('ush_feature_id', $input['ush_feature_id']); 
                }
if(isset($input['ush_material_id'])) {
                $query->where('ush_material_id', $input['ush_material_id']); 
                }
if(isset($input['ush_brand_id'])) {
                $query->where('ush_brand_id', $input['ush_brand_id']); 
                }
if(isset($input['ush_weight_id'])) {
                $query->where('ush_weight_id', $input['ush_weight_id']); 
                }
if(isset($input['ush_price_id'])) {
                $query->where('ush_price_id', $input['ush_price_id']); 
                }
if(isset($input['ush_fit_id'])) {
                $query->where('ush_fit_id', $input['ush_fit_id']); 
                }
if(isset($input['ush_specialty_size_id'])) {
                $query->where('ush_specialty_size_id', $input['ush_specialty_size_id']); 
                }
if(isset($input['img'])) {
                $query->where('img', $input['img']); 
                }
if(isset($input['img_plus'])) {
                $query->where('img_plus', $input['img_plus']); 
                }
if(isset($input['price'])) {
                $query->where('price', $input['price']); 
                }
if(isset($input['minimum_order'])) {
                $query->where('minimum_order', $input['minimum_order']); 
                }
if(isset($input['items'])) {
                $query->where('items', $input['items']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/ush_products'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

