<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/25/2015
 * Time: 9:11 PM
 */

class ProductController extends BaseController{
    public function get_index(){
        $p = new Products();
        return View::make('product.product')->with('product',$p->getProductName())
            ->with('group',Groups::all())
            ->with('style',Styles::all());
    }

    public function getProductByStyle($id){
        return View::make('frontend.sanpham')
            ->with('style_name', Styles::find($id)->name)
            ->with('products', Products::where('styleId', $id)->get())
            ->with('style',$this->style);
    }

    public function getAddProduct(){
        return View::make('product.addProduct')
            ->with('group',Groups::get())
            ->with('style',Styles::get());
    }
    public function postAddProduct(){
        $p = new Products();
        $recommended =0;    if(Input::get('recommended')=='on') $recommended =1;
        $active = 0;        if(Input::get('active')=='on') $active =1;

        $groupId       =    Input::get('groupId');
        $styleId       =    Input::get('styleId');
        $name          =    Input::get('name');
        $price         =    Input::get('price');
        $picture       =    'picture';
        $intro         =    Input::get('intro');
        $details       =    Input::get('details');
        $discount      =    Input::get('discount');
        $total         =    Input::get('total');

        $p->createProduct($groupId, $styleId, $name, $price, $picture, $intro, $details, $discount,$total, $recommended, $active);

        return Redirect::to('product')->with('global','Thêm thành công');
    }
    public function getUpdateProduct($id){
        $p = new Products();
        return View::make('product.updateProduct')
            ->with('product',$p->getProductById($id))
            ->with('group',Groups::get())
            ->with('style',Styles::get());
    }
    public function postUpdateProduct(){
        $p = new Products();
        $recommended =0;    if(Input::get('recommended')=='on') $recommended =1;
        $active = 0;        if(Input::get('active')=='on') $active =1;

        $id            =    Input::get('id');
        $groupId       =    Input::get('groupId');
        $styleId       =    Input::get('styleId');
        $name          =    Input::get('name');
        $price         =    Input::get('price');
        $picture       =    'picture';
        $intro         =    Input::get('intro');
        $details       =    Input::get('details');
        $discount      =    Input::get('discount');
        $total         =    Input::get('total');

        $p->updateProduct($id, $groupId, $styleId, $name, $price, $picture, $intro, $details, $discount,$total, $recommended, $active);
        return Redirect::to('product')->with('global','Cập nhật thành công');
    }
    public function getDeleteProduct($id){
        $p = new Products();
        $p->deleteProducts($id);
        return Redirect::to('product')->with('global','Xóa thành công thành công');
    }
    /************************Backend****************************/
    public function getShowProduct(){
        return View::make('product.showProduct')->with('products',Products::all())
            ->with('style', $this->style);
    }
    function getProductDetails($id){
        return View::make('frontend.chitiet1')->with('product', Products::find($id))
            ->with('style', $this->style);

    }
    function postProductSearchGs(){
        $n = new Products();
        $group = Input::get('group');
        $style = Input::get('style');
        return View::make('product.showProduct')->with('products',$n->getProductByGs($group,$style))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function postProductSearchName(){
        $n = new Products();
        return View::make('product.showProduct')->with('products',$n->getProductByName(Input::get('searchName')))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    function postProductSearchPrice(){
        $n = new Products();
        return View::make('product.showProduct')->with('products',$n->getProductByPrice(Input::get('searchPrice')))
            ->with('group',Groups::get())
            ->with('style',Styles::get())
            ->with('search','product/product-search-gs')
            ->with('searchLike','product/product-search-name');
    }
    /************************Backend****************************/
}