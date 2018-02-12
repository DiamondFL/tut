<?php

namespace App\Models;

use App\Constants\DBConst;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends Model implements Transformable
{
    use TransformableTrait;

    public $fillable = [DBConst::NAME, DBConst::DISPLAY_NAME, DBConst::DESCRIPTION, DBConst::IS_ACTIVE];

    public function scopeFilter($query, $input)
    {
        if(isset($input[DBConst::IS_ACTIVE]) && trim($input[DBConst::IS_ACTIVE]) !== '')
        {
            $query->where(DBConst::IS_ACTIVE,  trim($input[DBConst::IS_ACTIVE]) );
        }
        if(isset($input['name']) && trim($input['name']) !== '')
        {
            $query->where('name', 'LIKE', '%' . trim($input['name']) . '%');
        }
        if(isset($input[DBConst::DISPLAY_NAME]) && trim($input[DBConst::DISPLAY_NAME]) !== '')
        {
            $query->where(DBConst::DISPLAY_NAME, 'LIKE', '%' . trim($input[DBConst::DISPLAY_NAME]) . '%');
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
