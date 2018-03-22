<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends Model
{
    use TransformableTrait;

    public $fillable = [NAME_COL, DISPLAY_NAME_COL, DESCRIPTION_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if(isset($input[IS_ACTIVE_COL]) && trim($input[IS_ACTIVE_COL]) !== '')
        {
            $query->where(IS_ACTIVE_COL,  trim($input[IS_ACTIVE_COL]) );
        }
        if(isset($input[NAME_COL]) && trim($input[NAME_COL]) !== '')
        {
            $query->where(NAME_COL, 'LIKE', '%' . trim($input[NAME_COL]) . '%');
        }
        if(isset($input[DISPLAY_NAME_COL]) && trim($input[DISPLAY_NAME_COL]) !== '')
        {
            $query->where(DISPLAY_NAME_COL, 'LIKE', '%' . trim($input[DISPLAY_NAME_COL]) . '%');
        }
        return $query;
    }

    public function scopeOrder($query, $column, $value)
    {
        return $query->orderBy($column, $value);
    }

    public function permission() {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function user() {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

}

