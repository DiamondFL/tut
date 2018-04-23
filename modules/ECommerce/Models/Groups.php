<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 5:29 PM
 */

namespace ECommerce\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Groups extends Model
{
    protected $table = 'groups';
    protected $fillable = ['name', 'picture', 'note', 'is_active'];

    function addGroup()
    {
        $g = new Groups();
        $g->name = Input::get('name');
        $g->picture = Input::get('picture');
        $g->note = Input::get('note');
        $g->is_active = Input::get('is_active') ? 1 : 0;
        $g->save();
    }

    function deleteGroup($id)
    {
        Groups::where('id', $id)->delete();
    }

    function updateGroup($id, $data)
    {
        Groups::where('id', $id)->update($data);
    }

    function getUpdateGroup($id)
    {
        return Groups::where('id', $id)->first();
    }

    public function news()
    {
        return $this->hasMany('News', 'groupId');
    }

    public function product()
    {
        return $this->hasMany('Products', 'groupId');
    }

    public function comment()
    {
        return $this->hasMany('Comments', 'groupId');
    }
}