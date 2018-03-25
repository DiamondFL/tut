<?php

namespace Test\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RgReply extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'rg_replies';
    public $fillable = ['rg_question_id', 'content', 'integer'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['rg_question_id'])) {
                $query->where('rg_question_id', $input['rg_question_id']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }
if(isset($input['integer'])) {
                $query->where('integer', $input['integer']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/rg_replies'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

