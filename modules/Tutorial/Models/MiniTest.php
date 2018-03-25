<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MiniTest extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'mini_tests';
    public $fillable = ['lesson_id', 'questions', 'reply1', 'reply2', 'reply3', 'reply4', 'answer', 'is_active', 'created_by', 'updated_by'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['lesson_id'])) {
                $query->where('lesson_id', $input['lesson_id']); 
                }
if(isset($input['questions'])) {
                $query->where('questions', $input['questions']); 
                }
if(isset($input['reply1'])) {
                $query->where('reply1', $input['reply1']); 
                }
if(isset($input['reply2'])) {
                $query->where('reply2', $input['reply2']); 
                }
if(isset($input['reply3'])) {
                $query->where('reply3', $input['reply3']); 
                }
if(isset($input['reply4'])) {
                $query->where('reply4', $input['reply4']); 
                }
if(isset($input['answer'])) {
                $query->where('answer', $input['answer']); 
                }
if(isset($input['is_active'])) {
                $query->where('is_active', $input['is_active']); 
                }
if(isset($input['created_by'])) {
                $query->where('created_by', $input['created_by']); 
                }
if(isset($input['updated_by'])) {
                $query->where('updated_by', $input['updated_by']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/mini_tests'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

