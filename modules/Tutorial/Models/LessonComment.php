<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LessonComment extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lesson_comments';
    public $fillable = ['lesson_id', 'content', 'create_by', 'is_active'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['lesson_id'])) {
                $query->where('lesson_id', $input['lesson_id']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }
if(isset($input['create_by'])) {
                $query->where('create_by', $input['create_by']); 
                }
if(isset($input['is_active'])) {
                $query->where('is_active', $input['is_active']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lesson_comments'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

