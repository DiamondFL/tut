<?php

namespace App\Models;

use Istruct\MultiInheritance\ModelsTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable
{
    use TransformableTrait;
    use ModelsTrait;

    public $table = 'users';
    public $fillable = ['first_name', 'last_name', 'code', 'email', 'phone_number', 'sex', 'password', 'birthday', 'address', 'avatar', 'remember_token', 'active', 'last_login', 'last_logout', 'slack_webhook_url'];

    public function scopeFilter($query, $input)
    {
        return $query;
    }


    public $fileUpload = ['image' => 1];
    protected $pathUpload = ['image' => '/images/users'];
    protected $thumbImage = [
        'image' => [
            '/thumbs/' => [
                [200, 200], [300, 300], [400, 400]
            ]
        ]
    ];
    protected $checkbox = ['is_active'];
}

