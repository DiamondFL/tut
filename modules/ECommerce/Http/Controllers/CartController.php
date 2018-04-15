<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/23/2015
 * Time: 9:56 AM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use ECommerce\Models\Groups;
use ECommerce\Models\Order;
use ECommerce\Models\Products;
use ECommerce\Models\Styles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CartController extends BaseController
{
    /***********Xử lý giỏ hàng************/
    public function add($id)
    {
        if (Session::has('cart.' . $id)) {
            $qty = Session::get('cart.' . $id);
            $qty = $qty + 1;
            Session::put('cart.' . $id, $qty);
        } else {
            Session::put('cart.' . $id, 1);
        }
        $n = new Products();
        return view('eco::order.cart')
            ->with('products', $n->getInvolveProduct($id))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function delete()
    {
        Session::forget('cart');
        return view('eco::order.cart')
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function getDeleteProduct($id)
    {
        Session::forget('cart.' . $id);
        $n = new Products();
        return view('eco::order.cart')
            ->with('products', $n->getInvolveProduct($id))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function getQuitCart($id)
    {
        Session::flush();
        $n = new Products();
        return view('eco::order.cart')
            ->with('products', $n->getInvolveProduct($id))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function order()
    {
        $listProduct = '';
        $listQty = '';
        foreach (Session::get('cart') as $key => $value) {
            $listProduct .= ' ' . $key;
            $listQty .= ' ' . $value;
        }
        $order = new Order();
        $order->setOrder(trim($listProduct), trim($listQty), \auth()->id());
        Session::forget('cart');
        return Redirect::intended('/')->with('global', 'Bạn đã đặt hàng thành công');
    }

    function change()
    {
        foreach (Session::get('cart') as $id => $value) {
            if (Input::get($id) == 0) Session::forget('cart.' . $id);
            else Session::put('cart.' . $id, Input::get($id));
        }
        return view('eco::order.cart')
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }
} 