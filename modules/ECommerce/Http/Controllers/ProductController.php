<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/25/2015
 * Time: 9:11 PM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use ECommerce\Models\Groups;
use ECommerce\Models\Products;
use ECommerce\Models\Styles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ProductController extends BaseController
{
    public function index()
    {
        $p = new Products();
        return view('eco::product.index')->with('product', $p->getProductName())
            ->with('group', Groups::all())
            ->with('style', Styles::all());
    }

    public function getProductByStyle($id)
    {
        return view('eco::frontend.sanpham')
            ->with('style_name', Styles::find($id)->name)
            ->with('products', Products::where('styleId', $id)->get())
            ->with('style', $this->style);
    }

    public function create()
    {
        return view('eco::product.create')
            ->with('group', Groups::get())
            ->with('style', Styles::get());
    }

    public function store()
    {
        $p = new Products();
        $recommended = 0;
        if (Input::get('recommended') == 'on') $recommended = 1;
        $is_active = 0;
        if (Input::get('is_active') == 'on') $is_active = 1;

        $groupId = Input::get('groupId');
        $styleId = Input::get('styleId');
        $name = Input::get('name');
        $price = Input::get('price');
        $picture = 'picture';
        $intro = Input::get('intro');
        $details = Input::get('details');
        $discount = Input::get('discount');
        $total = Input::get('total');

        $p->createProduct($groupId, $styleId, $name, $price, $picture, $intro, $details, $discount, $total, $recommended, $is_active);

        return \redirect()->route('product.index')->with('global', 'Thêm thành công');
    }

    public function edit($id)
    {
        $p = new Products();
        return view('eco::product.update')
            ->with('product', $p->getProductById($id))
            ->with('group', Groups::get())
            ->with('style', Styles::get());
    }

    public function update($id)
    {
        $p = new Products();
        $recommended = 0;
        if (Input::get('recommended') == 'on') $recommended = 1;
        $is_active = 0;
        if (Input::get('is_active') == 'on') $is_active = 1;
        $groupId = Input::get('groupId');
        $styleId = Input::get('styleId');
        $name = Input::get('name');
        $price = Input::get('price');
        $picture = 'picture';
        $intro = Input::get('intro');
        $details = Input::get('details');
        $discount = Input::get('discount');
        $total = Input::get('total');

        $p->updateProduct($id, $groupId, $styleId, $name, $price, $picture, $intro, $details, $discount, $total, $recommended, $is_active);
        return \redirect()->route('product.index')->with('global', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $p = new Products();
        $p->deleteProducts($id);
        return \redirect()->route('product.index')->with('global', 'Xóa thành công thành công');
    }

    /************************Backend****************************/
    public function getShowProduct()
    {
        return view('eco::product.showProduct')->with('products', Products::all())
            ->with('style', $this->style);
    }

    function detail($id)
    {
        return view('eco::frontend.chitiet1')->with('product', Products::find($id))
            ->with('style', $this->style);

    }

    function postProductSearchGs()
    {
        $n = new Products();
        $group = Input::get('group');
        $style = Input::get('style');
        return view('eco::product.showProduct')->with('products', $n->getProductByGs($group, $style))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function postProductSearchName()
    {
        $n = new Products();
        return view('eco::product.showProduct')->with('products', $n->getProductByName(Input::get('searchName')))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }

    function postProductSearchPrice()
    {
        $n = new Products();
        return view('eco::product.showProduct')->with('products', $n->getProductByPrice(Input::get('searchPrice')))
            ->with('group', Groups::get())
            ->with('style', Styles::get())
            ->with('search', 'product/product-search-gs')
            ->with('searchLike', 'product/product-search-name');
    }
    /************************Backend****************************/
}