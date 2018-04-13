<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/13/2015
 * Time: 5:29 PM
 */

class Groups extends Eloquent{
    protected $table = 'group';
    function addGroup(){
        $g = new Groups();
        $g->name = Input::get('name');
        $g->picture = Input::get('picture');
        $g->note = Input::get('note');
        $g->save();
    }
    function deleteGroup($id){
        Groups::where('id',$id)->delete();
    }
    function updateGroup($id,$data){
        Groups::where('id',$id)->update($data);
    }
    function getUpdateGroup($id){
        return Groups::where('id',$id)->first();
    }
    public function news(){
        return $this->hasMany('News','groupId');
    }
    public function product(){
        return $this->hasMany('Products','groupId');
    }
    public function comment(){
        return $this->hasMany('Comments','groupId');
    }
}