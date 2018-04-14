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

class News extends Model
{
    public $table = 'eco_news';

    function addNews()
    {
        $n = new News();
        $n->groupId = Input::get('groupId');
        $n->styleId = Input::get('styleId');
        $n->title = Input::get('title');
        $n->intro = Input::get('intro');
        $n->details = Input::get('details');
        $n->save();
    }

    function deleteNews($id)
    {
        News::find($id)->delete();
    }

    function updateNews($id, $data)
    {
        News::where('id', $id)->update($data);
    }

    function getNewsById($id)
    {
        return News::where('id', $id)->first();
    }

    function getNewsByGs($g, $s)
    {
        if ($g == 0 && $s == 0) $news = News::get();
        elseif ($g != 0 && $s == 0) $news = News::where('groupId', $g)->get();
        elseif ($g == 0 && $s != 0) $news = News::where('styleId', $s)->get();
        else $news = News::where('groupId', $g)->where('styleId', $s)->get();
        return $news;
    }

    function getNewsByName($name)
    {
        return $news = News::where('title', 'LIKE', "%$name%")->get();
    }
} 