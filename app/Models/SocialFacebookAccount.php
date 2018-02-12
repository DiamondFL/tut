<?php

namespace App\Models;;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SocialFacebookAccount extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'social_facebook_accounts';
    public $fillable = [''];

    public function scopeFilter($query, $input)
    {
        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/social_facebook_accounts'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

