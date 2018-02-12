<?php

namespace DocPros\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DocPackage extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'doc_packages';
    public $fillable = ['name', 'link', 'intro'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['name'])) {
                $query->where('name', $input['name']); 
                }
if(isset($input['link'])) {
                $query->where('link', $input['link']); 
                }
if(isset($input['intro'])) {
                $query->where('intro', $input['intro']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/doc_packages'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

