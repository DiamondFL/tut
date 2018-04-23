<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 2:52 PM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use ECommerce\Models\Styles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StyleController extends BaseController
{
    function index()
    {
        return view('eco::style.index')->with('style', Styles::get());
    }

    function create()
    {
        return view('eco::Style.create');
    }

    function store()
    {
        $g = new Styles;
        $g->addStyle();
        return \redirect()->route('style.index')
            ->with('global', 'Thêm thành công');
    }

    function destroy($id)
    {
        $g = new Styles;
        $g->deleteStyle($id);
        return \redirect()->route('style.index')
            ->with('global', 'Xóa thành công');
    }

    function edit($id)
    {
        $g = new Styles;
        return view('eco::style.update')
            ->with('style', $g->getUpdateStyle($id));
    }

    function update($id)
    {
        $g = new Styles();
        $is_active = 0;
        if (Input::get('is_active') == 'on') {
            $is_active = 1;
        }
        $data = array(
            'name' => Input::get('name'),
            'picture' => Input::get('picture'),
            'note' => Input::get('note'),
            'is_active' => $is_active,
        );
        $g->setUpdateStyle($id, $data);
        return \redirect()->route('style.index')
            ->with('global', 'Cập nhật thành công');
    }
} 