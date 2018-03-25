<?php

namespace Test\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RgResult extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'rg_results';
    public $fillable = ['rg_test_id', 'user_id', 'score', 'rg_results_id'];

    public function scopeFilter($query, $input)
    {
        if(isset($input['rg_test_id'])) {
                $query->where('rg_test_id', $input['rg_test_id']); 
                }
if(isset($input['user_id'])) {
                $query->where('user_id', $input['user_id']); 
                }
if(isset($input['score'])) {
                $query->where('score', $input['score']); 
                }
if(isset($input['rg_results_id'])) {
                $query->where('rg_results_id', $input['rg_results_id']); 
                }

        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/rg_results'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

