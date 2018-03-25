<?php

namespace Test\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RgAnswer extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'rg_answers';
    public $fillable = ['min', 'max', 'content'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['min'])) {
                $query->where('min', $input['min']); 
                }
if(isset($input['max'])) {
                $query->where('max', $input['max']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/rg_answers'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

