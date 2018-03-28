<?php

namespace App;

use App\Models\Role;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Istruct\MultiInheritance\ModelsTrait;

class User extends Authenticatable
{
    use Notifiable;
    use ModelsTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [FIRST_NAME_COL, LAST_NAME_COL, CODE_COL, EMAIL_COL, 'phone_number', 'sex', 'password', 'birthday',
        'address', 'avatar', 'remember_token', 'active', 'last_login', 'last_logout', 'slack_webhook_url'];

    public function scopeFilter($query, $input)
    {
        if(isset($input[EMAIL_COL]))
        {
            $query->where(EMAIL_COL, $input[EMAIL_COL]);
        }
        return $query;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function isSuperAdmin()
    {
        return $this->roles()->where('name', 'admin')->count();
    }

    public function hasRole($name, RoleRepository $repository)
    {
        return $repository->is($name);
    }
    public function hasPermission($name, PermissionRepository $repository)
    {
        return $repository->is($name);
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
