<?php

namespace ECommerce\Http\Controllers;


use ECommerce\Models\Products;
;

class HomeController extends BaseController
{
    public function home(){
        return view('eco::home');
    }
}

