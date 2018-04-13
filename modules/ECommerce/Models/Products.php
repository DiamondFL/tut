<?php
/**
 * Created by PhpStorm.
 * User: YYY
 * Date: 4/25/2015
 * Time: 9:33 PM
 */

class Products extends Eloquent{
    public $table = 'product';
    function createProduct($groupId, $styleId, $name, $price, $picture, $intro, $details, $discount, $total, $recommended, $active){
        $p  =   new Products();
        $p  ->  groupId     =   $groupId;
        $p  ->  styleId     =   $styleId;
        $p  ->  name        =   $name;
        $p  ->  price       =   $price;
        $p  ->  picture     =   Products::upload($picture);
        $p  ->  intro       =   $intro;
        $p  ->  details     =   $details;
        $p  ->  discount    =   $discount;
        $p  ->  total       =   $total;
        $p  ->  recommended =   $recommended;
        $p  ->  active      =   $active;
        $p  ->  save();

    }
    function updateProduct($id, $groupId, $styleId, $name, $price, $picture, $intro, $details, $discount,$total, $recommended, $active){
        $pic = Products::upload($picture);
        $p  =   Products::find($id);
        $p  ->  groupId     =   $groupId;
        $p  ->  styleId     =   $styleId;
        $p  ->  name        =   $name;
        $p  ->  price       =   $price;
        if($pic!==NULL) $p  ->  picture     =   $pic;
        $p  ->  intro       =   $intro;
        $p  ->  details     =   $details;
        $p  ->  discount    =   $discount;
        $p  ->  total       =   $total;
        $p  ->  recommended =   $recommended;
        $p  ->  active      =   $active;
        $p  ->  save();

    }
    function getProductName(){
        return Products::get();
    }
    function deleteProducts($id){
        Products::where('id',$id)->delete();
    }
    function getProductById($id){
        return Products::find($id);
    }
    public function upload($file){
        if (Input::hasFile($file))
        {
            $u  = Input::file($file);
            $imgName = $u->getClientOriginalName();
            /*Thực hiện upload*/
            $u->move('uploads/products/',$imgName);
            $image = Image::make(sprintf('uploads/products/'.$imgName, $u->getClientOriginalName()))->resize(500, 400)->save();

            return 'uploads/products/'.$imgName;
        }
        return null;
    }
    public function style(){
        return  $this->belongsTo('Styles','styleId');
    }
    public function getInvolveProduct($id){
         $styleId = Products::find($id)->styleId;
        $of = rand(0,Styles::count()-3);
        return Products::where('styleId',$styleId)->offset($of)->take(4)->get();
    }
    public function getProductByGs($g,$s){
        if($g==0 && $s==0) $Products = Products::get();
        elseif($g!=0 && $s==0) $Products = Products::where('groupId',$g)->get();
        elseif($g==0 && $s!=0) $Products = Products::where('styleId',$s)->get();
        else $Products = Products::where('groupId',$g)->where('styleId',$s)->get();
        return $Products;
    }
    public function getProductByName($name){
        return $news = Products::where('name', 'LIKE', "%$name%")->get();
    }
    public function getProductByPrice($price){
        define('pri',50000);
        $end = $price +1;
        if($price==4) $end = 9;
        return $news = Products::whereBetween('price', array($price*pri, $end*pri))->get();
    }
}