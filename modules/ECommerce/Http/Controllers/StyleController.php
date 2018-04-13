<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 2:52 PM
 */
class StyleController extends BaseController{
    function get_index(){
        return View::make('style.style')->with('style',Styles::get());
    }
    function getAddStyle(){
        return View::make('Style.addStyle');
    }
    function postAddStyle(){
        $g = new Styles;
        $g->addStyle();
        return Redirect::to('style')
            ->with('global','Thêm thành công');
    }
    function getDeleteStyle($id){
        $g = new Styles;
        $g->deleteStyle($id);
        return Redirect::to('style')
            ->with('global','Xóa thành công');
    }
    function getUpdateStyle($id){
        $g = new Styles;
        return View::make('Style.updateStyle')
            ->with('style',$g->getUpdateStyle($id));
    }
    function postUpdateStyle(){
        $g = new Styles();
        $active=0;
        if(Input::get('active')=='on'){
            $active = 1;
        }
        $data = array(
            'name'=>Input::get('name'),
            'picture'=>Input::get('picture'),
            'note'=>Input::get('note'),
            'active'=>$active,
        );
        $g->setUpdateStyle(Input::get('id'),$data);
        return Redirect::to('style')
            ->with('global','Cập nhật thành công');
    }
} 