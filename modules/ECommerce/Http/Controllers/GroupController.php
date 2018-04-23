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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class GroupController extends BaseController
{
    function index()
    {
        return view('eco::group.index')->with('group', Groups::get());
    }

    function create()
    {
        return view('eco::group.create');
    }

    function store()
    {
        $g = new Groups;
        $g->addGroup();
        return \redirect()->back()
            ->with('global', 'Thêm thành công');
    }

    function destroy($id)
    {
        $g = new Groups;
        $g->deleteGroup($id);
        return \redirect()->route('group.index')
            ->with('global', 'Xóa thành công');
    }

    function edit($id)
    {
        $g = new Groups;
        return view('eco::group.update')->with('data', $g->getUpdateGroup($id));
    }

    function update($id)
    {
        $g = new Groups();
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
        $g->updateGroup($id, $data);
        return \redirect()->route('group.index')
            ->with('global', 'Cập nhật thành công');

    }
} 