<?php

namespace Tutorial\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'lessons';
    public $fillable = ['title', 'intro', 'content', 'section_id', 'views', 'last_view', 'created_by', 'updated_by', 'is_active'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['title'])) {
                $query->where('title', $input['title']); 
                }
if(isset($input['intro'])) {
                $query->where('intro', $input['intro']); 
                }
if(isset($input['content'])) {
                $query->where('content', $input['content']); 
                }
if(isset($input['section_id'])) {
                $query->where('section_id', $input['section_id']); 
                }
if(isset($input['views'])) {
                $query->where('views', $input['views']); 
                }
if(isset($input['last_view'])) {
                $query->where('last_view', $input['last_view']); 
                }
if(isset($input['created_by'])) {
                $query->where('created_by', $input['created_by']); 
                }
if(isset($input['updated_by'])) {
                $query->where('updated_by', $input['updated_by']); 
                }
if(isset($input['is_active'])) {
                $query->where('is_active', $input['is_active']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/lessons'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

