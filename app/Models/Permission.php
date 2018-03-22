<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends Model implements Transformable
{
    use TransformableTrait;

    public $fillable = [NAME_COL, DISPLAY_NAME_COL, DESCRIPTION_COL, IS_ACTIVE_COL];

    public function scopeFilter($query, $input)
    {
        if(isset($input[IS_ACTIVE_COL]) && trim($input[IS_ACTIVE_COL]) !== '')
        {
            $query->where(IS_ACTIVE_COL,  trim($input[IS_ACTIVE_COL]) );
        }
        if(isset($input['name']) && trim($input['name']) !== '')
        {
            $query->where('name', 'LIKE', '%' . trim($input['name']) . '%');
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

    public function role() {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}
