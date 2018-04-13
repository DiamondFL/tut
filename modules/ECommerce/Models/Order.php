<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/12/2015
 * Time: 10:05 PM
 */

class Order extends Eloquent{
    protected $table = 'order';
    function setOrder($listProduct,$listQty,$userId){
        $o = new Order();
        $o -> listProducts = $listProduct;
        $o -> listQty = $listQty;
        $o -> userId = $userId;
        $o  -> save();
    }
    function getIdNameOrder(){
        return Order::all();
    }
    public function user()
    {
        return $this->belongsTo('User',"userId");
    }
    public function getOrderById($id){
        return Order::find($id);
    }
} 