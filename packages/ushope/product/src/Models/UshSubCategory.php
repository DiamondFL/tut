<?php

namespace Ush\Product\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UshSubCategory extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'ush_sub_categories';
    public $fillable = ['name', 'ush_category_id'];

    public function scopeFilter($query, $input)
    {
        if (isset($input['name'])) {
            $query->where('name', $input['name']);
        }
        if (isset($input['ush_category_id'])) {
            $query->where('ush_category_id', $input['ush_category_id']);
        }

        return $query;
    }

    public function category()
    {
        return $this->belongsTo(UshCategory::class);
    }

    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/ush_sub_categories'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

