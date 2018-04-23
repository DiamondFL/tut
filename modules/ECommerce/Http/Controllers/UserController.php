<?php
/**
 * Created by PhpStorm.
 * User: YingDiamond
 * Date: 3/1/2015
 * Time: 2:48 PM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends BaseController
{
    function index()
    {
        return view('eco::account.user')->with('users', User::get());
    }

    function getDeleteUser($id)
    {
        User::where('id', $id)->delete();
        return view('eco::account.user')
            ->with('users', User::get())
            ->with('global', 'Xóa thành công tài khoản');
    }

    function getViewUser($id)
    {
        return view('eco::account.viewUser')
            ->with('user', User::where('id', $id)->get());
    }

    public function postGetSession()
    {
        $a = Session::get(Input::get('session'));
        return Response::json($a);
    }

    public function postUpdateUser()
    {
        $admin = 0;
        $active = 0;
        if (Input::get('admin') == 'on') $admin = 1;
        if (Input::get('active') == 'on') $active = 1;
        $u = new User();
        $u->updateUser(Input::get('userId'), $admin, $active);
        return view('eco::account.user')
            ->with('global', 'Bạn cập nhật tài khoản thành công')
            ->with('users', User::get());
    }
} 