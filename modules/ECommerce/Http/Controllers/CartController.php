<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/23/2015
 * Time: 9:56 AM
 */

class CartController extends BaseController{
    /***********Xử lý giỏ hàng************/
    public function getAddCart($id){
        if(Session::has('cart.'.$id)){
            $qty = Session::get('cart.'.$id);
            $qty = $qty +1;
            Session::put('cart.'.$id, $qty);
        }else{
            Session::put('cart.'.$id, 1);
        }
        $n = new Products();
         return View::make('order.cart')
             ->with('products',$n->getInvolveProduct($id))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function getDeleteCart(){
        Session::forget('cart');
        $n = new Products();
        return View::make('order.cart')
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function getDeleteProduct($id){
        Session::forget('cart.'.$id);
        //return 'cart'.$id;
        $n = new Products();
         return View::make('order.cart')
             ->with('products',$n->getInvolveProduct($id))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function getQuitCart($id){
        Session::flush();
        $n = new Products();
         return View::make('order.cart')
             ->with('products',$n->getInvolveProduct($id))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function getOrderCart(){
        $cart = Session::get('cart');
        $listProduct ='';
        $listQty ='';
        foreach(Session::get('cart') as $key=>$value){
            $listProduct .= ' '.$key;
            $listQty .= ' '.$value;
        }
        $order = new Order();
        $order->setOrder(trim($listProduct),trim($listQty),Auth::user()->id);
        Session::forget('cart');
        return Redirect::intended('/')->with('global','Bạn đã đặt hàng thành công');
    }
    function postUpdateCart(){
        foreach(Session::get('cart') as $id=>$value){
            if(Input::get($id)==0) Session::forget('cart.'.$id);
            else Session::put('cart.'.$id, Input::get($id));
        }
        $n = new Products();
         return View::make('order.cart')
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
} 