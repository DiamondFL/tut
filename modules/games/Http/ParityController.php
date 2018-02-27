<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/23/2018
 * Time: 7:31 PM
 */
namespace Games\Http\Controllers;
use Illuminate\Http\Request;

class ParityController
{
    public function index() {

    }
    public function play(Request $request)
    {
        $money = 10;
        $input = $request->all();
        $coin = (int) $input['coin'];
        if($coin < 0)
        {
            session()->flash('error', 'Chúng tôi vừa phát hiện bạn có hành vi giân lận');
        }
        $result = rand(0, 6);
        if(! $input['betting'] == $result%2) {
            $coin = 0 - $coin;
        }
        $money += $coin;

    }
    public function result()
    {

    }
}