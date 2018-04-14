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

class Styles extends Model
{
    public $table = 'style';

    function addStyle()
    {
        $s = new Styles();
        $s->name = Input::get('name');
        $s->picture = Input::get('picture');
        $s->note = Input::get('note');
        $s->save();
    }

    function deleteStyle($id)
    {
        Styles::where('id', $id)->delete();
    }

    function getUpdateStyle($id)
    {
        return Styles::where('id', $id)->first();
    }

    function setUpdateStyle($id, $data)
    {
        return Styles::where('id', $id)->update($data);
    }

    public function product()
    {
        return $this->hasMany('Products', 'styleId');
    }
} 