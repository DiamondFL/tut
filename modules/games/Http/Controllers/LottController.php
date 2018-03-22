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
        $user = auth()->user();
        if($user->coin <= 0)
        {
            session()->flash()->flash(ERROR, 'Bạn đã hết coin. Vui lòng đào coin để chơi tiếp');
            return redirect()->back();
        }
        $input = $request->all();
        $lotts = [];
        foreach ($input['lott'] as $k => $value) {
            $lotts[] = (int)$value;
        }
        $numberLotts = [];
        for ($i = 1; $i < 7; $i++) {
            $numberLotts[] = rand(0, 36);
        }
        $numberSames = [];
        foreach ($numberLotts as $numberLott) {
            foreach ($lotts as $lott) {
                if($numberLott === $lott) {
                    $numberSames[] = $lott;
                }
            }
        }
        $coin = -10;
        switch (count($numberSames)) {
            case 3: {
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 300 Coin');
                $coin = 300;
                break;
            }
            case 4: {
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 3000 Coin');
                $coin = 3000;
                break;
            }
            case 5: {
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 100000 Coin');
                $coin = 100000;
                break;
            }
            case 6: {
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 1000000000 Coin');
                $coin = 1000000000;
                break;
            }
            default : {
                session()->flash('global', 'Chúc đỗ hiệp may mắn lần sau');
                break;
            }
        }
        $user->coin +=  $coin;
        $user->save();
        return view('gm::lott.index', compact('numberLotts','coin', 'numberSames'))
            ->with('lotts', $input['lott']);
    }
}