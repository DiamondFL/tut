<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 2:52 PM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use ECommerce\Models\Groups;
use ECommerce\Models\News;
use ECommerce\Models\Styles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class NewsController extends BaseController
{
    function index()
    {
        return view('eco::news.news')->with('news', News::get());
    }

    function getAddNews()
    {
        return view('eco::news.addNews')->with('group', Groups::get())->with('style', Styles::get());
    }

    function postAddNews()
    {
        $n = new News();
        $n->addNews();
        return Redirect::to('news')->with('global', 'Thêm tin tức thành công');
    }

    function getDeleteNews($id)
    {
        $n = new News();
        $n->deleteNews($id);
        return Redirect::to('news')->with('global', 'Delete tin tức thành công');
    }

    function getUpdateNews($id)
    {
        $n = new News();
        $n->getNewsById($id);
        return view('eco::news.updateNews')->with('group', Groups::get())->with('style', Styles::get())
            ->with('news', $n->getNewsById($id));
    }

    function postUpdateNews($id)
    {
        $n = new News();
        $active = 0;
        if (Input::get('active') == 'on') {
            $active = 1;
        }
        $data = array(
            'title' => Input::get('title'),
            'intro' => Input::get('intro'),
            'groupId' => Input::get('groupId'),
            'styleId' => Input::get('styleId'),
            'details' => Input::get('details'),
            'active' => $active,
        );
        $n->updateNews(Input::get('id'), $data);
        return Redirect::to('news')->with('global', 'Cập nhật tin tức thành công');
    }

    function getNewsShow()
    {
        return view('eco::frontend.tintuc')->with('news', News::get())
            ->with('style', $this->style);
    }

    function getNewsDetails($id)
    {
        $n = new News();
        return view('eco::frontend.tintuc_chitiet')->with('news', $n->getNewsById($id))
            ->with('style', $this->style);
    }

    function postNewsSearchGs()
    {
        $n = new News();
        $group = Input::get('group');
        $style = Input::get('style');
        return view('eco::news.newsShow')->with('news', $n->getNewsByGs($group, $style))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'news/news-search-gs')
            ->with('searchLike', 'news/news-search-name');
    }

    function postNewsSearchName()
    {
        $n = new News();
        return view('eco::news.newsShow')->with('news', $n->getNewsByName(Input::get('searchName')))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'news/news-search-gs')
            ->with('searchLike', 'news/news-search-name');
    }
} 