<?php

namespace Test\Rg\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RgTest extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'rg_tests';
    public $fillable = ['title', 'content', 'rg_question_ids'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['title'])) {
                $query->where('title', $input['title']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }
if(isset($input['rg_question_ids'])) {
                $query->where('rg_question_ids', $input['rg_question_ids']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/rg_tests'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

