<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 8/3/17
 * Time: 11:39 AM
 */

namespace ACL\Models;

use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use TransformableTrait;

    public $fillable = [NAME_COL, DISPLAY_NAME_COL, DESCRIPTION_COL, IS_ACTIVE_COL, MODULE_ID_COL, ACCESS_ID_COL];

    public function scopeFilter($query, $input)
    {
        if(isset($input[MODULE_ID_COL]) && trim($input[MODULE_ID_COL]) !== '')
        {
            $query->where(MODULE_ID_COL, trim($input[MODULE_ID_COL]) );
        }
        if(isset($input[ACCESS_ID_COL]) && trim($input[ACCESS_ID_COL]) !== '')
        {
            $query->where(ACCESS_ID_COL, trim($input[ACCESS_ID_COL]) );
        }
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

    public function role() {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}