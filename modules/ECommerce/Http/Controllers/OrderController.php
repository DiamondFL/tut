<?php
/**
 * Created by PhpStorm.
 * User: 340
 * Date: 5/17/2015
 * Time: 10:04 PM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use ECommerce\Models\Groups;
use ECommerce\Models\Order;
use ECommerce\Models\Styles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class OrderController extends BaseController
{
    function index()
    {
        $o = new Order();
        return view('eco::order.order')->with('order', $o->getIdNameOrder());
    }

    public function getAddOrder()
    {
        return view('eco::Order.addOrder')
            ->with('group', Groups::get())
            ->with('style', Styles::get());
    }

    public function postAddOrder()
    {
        $p = new Order();
        $recommended = 0;
        if (Input::get('recommended') == 'on') $recommended = 1;
        $active = 0;
        if (Input::get('active') == 'on') $active = 1;

        $groupId = Input::get('groupId');
        $styleId = Input::get('styleId');
        $name = Input::get('name');
        $price = Input::get('price');
        $picture = 'picture';
        $intro = Input::get('intro');
        $details = Input::get('details');
        $discount = Input::get('discount');
        $total = Input::get('total');

        $p->createOrder($groupId, $styleId, $name, $price, $picture, $intro, $details, $discount, $total, $recommended, $active);


        return Redirect::to('Order')->with('global', 'Thêm thành công');
    }

    public function getUpdateOrder($id)
    {
        $p = new Order();
        return view('eco::Order.updateOrder')
            ->with('order', $p->getOrderById($id))
            ->with('group', Groups::get())
            ->with('style', Styles::get());
    }

    public function postUpdateOrder()
    {
        $p = new Order();
        $recommended = 0;
        if (Input::get('recommended') == 'on') $recommended = 1;
        $active = 0;
        if (Input::get('active') == 'on') $active = 1;

        $id = Input::get('id');
        $groupId = Input::get('groupId');
        $styleId = Input::get('styleId');
        $name = Input::get('name');
        $price = Input::get('price');
        $picture = 'picture';
        $intro = Input::get('intro');
        $details = Input::get('details');
        $discount = Input::get('discount');
        $total = Input::get('total');

        $p->updateOrder($id, $groupId, $styleId, $name, $price, $picture, $intro, $details, $discount, $total, $recommended, $active);
        return Redirect::to('Order')->with('global', 'Cập nhật thành công');
    }

    public function getDeleteOrder($id)
    {
        $p = new Order();
        $p->deleteOrders($id);
        return Redirect::to('Order')->with('global', 'Xóa thành công thành công');
    }
}