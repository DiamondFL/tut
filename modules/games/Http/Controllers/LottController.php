<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/16/2018
 * Time: 8:44 PM
 */

namespace Games\Http\Controllers;


use Illuminate\Http\Request;

class LottController
{
    public function index()
    {
        return view('gm::lott.index');
    }

    public function play(Request $request)
    {
        $input = $request->all();
        $lotts = [];
        foreach ($input['lott'] as $k => $value) {
            $lotts[] = (int)$value;
        }
        $numberLotts = [];
        for ($i = 1; $i < 7; $i++) {
            $numberLotts[] = rand(0, 99);
        }
        $numberSames = [];
        foreach ($numberLotts as $numberLott) {
            foreach ($lotts as $lott) {
                if($numberLott === $lott) {
                    $numberSames = $lott;
                }
            }
        }
        switch (count($numberSames)) {
            case 3: {
                break;
            }
            case 4: {
                break;
            }
            case 5: {
                break;
            }
            case 6: {
                break;
            }
            default : {
                break;
            }
        }
        $result = array_diff($input, $numberLott);
        return view('gm::lott.index');
    }
}