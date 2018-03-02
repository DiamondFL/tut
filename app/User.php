<?php

namespace App;

use App\Models\Role;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['first_name', 'last_name', 'code', 'email', 'phone_number', 'sex', 'password', 'birthday',
        'address', 'avatar', 'remember_token', 'active', 'last_login', 'last_logout', 'slack_webhook_url'];

    public function scopeFilter($query, $input)
    {
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

    public function role() {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function isSuperAdmin()
    {
        return $this->role()->where('name', 'admin')->count();
    }

    public function hasRole($name, RoleRepository $repository)
    {
        return $repository->is($name);
    }
    public function hasPermission($name, PermissionRepository $repository)
    {
        return $repository->is($name);
    }
}
