<?php

namespace Test\Rg\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RgQuestion extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'rg_questions';
    public $fillable = ['content'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/rg_questions'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

