<?php
/**
 * Created by PhpStorm.
 * User: YingDiamond
 * Date: 3/1/2015
 * Time: 2:48 PM
 */

class UserController extends BaseController{
    function get_index(){
        return View::make('account.user')->with('users',User::get());
    }
    function getDeleteUser($id){
        User::where('id',$id)->delete();
        return View::make('account.user')
            ->with('users',User::get())
            ->with('global','Xóa thành công tài khoản');
    }
    function getViewUser($id){
        return View::make('account.viewUser')
            ->with('user',User::where('id',$id)->get());
    }
    public function postGetSession(){
        $a = Session::get(Input::get('session'));
        return Response::json($a);
    }
    public function postUpdateUser(){
        $admin = 0;
        $active = 0;
         if(Input::get('admin')=='on')      $admin = 1;
         if(Input::get('active')=='on')     $active = 1;
            $u = new User();
            $u->updateUser(Input::get('userId'),$admin, $active);
        return View::make('account.user')
            ->with('global','Bạn cập nhật tài khoản thành công')
            ->with('users',User::get());
    }
} 