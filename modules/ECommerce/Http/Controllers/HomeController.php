<?php

class HomeController extends BaseController{
    public function home(){
        return View::make('frontend.index')
            ->with('products', Products::orderBy('created_at')->limit(9)->get())
            ->with('style', $this->style);
    }
    public function getContact(){
        $data['style'] = $this->style;
        return View::make('frontend.lienhe', $data);
    }
    public function getIntro(){
        $data['style'] = $this->style;
        return View::make('frontend.gioithieu', $data);
    }
    public function getBaogia(){
        $data['style'] = $this->style;
        return View::make('frontend.baogia', $data);
    }
    public function getAdmin(){
        $data['style'] = $this->style;
        return View::make('home', $data);
    }

}
