<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 2:52 PM
 */

class GroupController extends BaseController{
    function get_index(){
        return View::make('group.group')->with('group',Groups::get());
    }
    function getAddGroup(){
        return View::make('group.addGroup');
    }
    function postAddGroup(){
        $g = new Groups;
        $g->addGroup();
        return Redirect::to('group')
            ->with('global','Thêm thành công');
    }
    function getDeleteGroup($id){
        $g = new Groups;
        $g->deleteGroup($id);
        return Redirect::to('group')
            ->with('global','Xóa thành công');
    }
    function getUpdateGroup($id){
        $g = new Groups;
        return View::make('group.updateGroup')->with('data',$g->getUpdateGroup($id));
    }
    function postUpdateGroup(){
        $g = new Groups();
        $active=0;
        if(Input::get('active')=='on'){
            $active = 1;
        }
        var_dump(Input::get('active'));
        $data = array(
            'name'=>Input::get('name'),
            'picture'=>Input::get('picture'),
            'note'=>Input::get('note'),
            'active'=>$active,
        );
        $g->updateGroup(Input::get('id'),$data);
        return Redirect::to('group')
            ->with('global','Cập nhật thành công');

    }
} 