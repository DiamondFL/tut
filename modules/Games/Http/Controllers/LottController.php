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
            session()->flash(ERROR, 'Bạn đã hết coin. Vui lòng đào coin để chơi tiếp');
            return redirect()->back();
        }
        $input = $request->all();
        $lotts = [];
        foreach ($input['lott'] as $k => $value) {
            $lotts[] = (int)$value;
        }
        $numberLotts = [];
        for ($i = 1; $i < 7; $i++) {
            $num = rand(0, 45);
            while (in_array($num, $numberLotts)) {
                $num = rand(0, 45);
            }
            $numberLotts[] = rand(0, 45);
        }
        $numberSames = [];
        $ss = $numberLotts;
        $kk  = $lotts;
        foreach ($ss as $k => $numberLott) {
            foreach ($kk as $i => $lott) {
                if(isset($ss[$k]) && isset($kk[$i]) && $ss[$k] === $kk[$i]) {
                    $numberSames[] = $kk[$i];
                    unset($ss[$k]);
                    unset($kk[$i]);
                    continue;
                }
            }
        }
        $coin = -10;
        switch (count($numberSames)) {
            case 3: {
                $coin = 200;
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 300 Coin');
                break;
            }
            case 4: {
                $coin = 3000;
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 3,000 Coin');
                break;
            }
            case 5: {
                $coin = 100000;
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 10,0000 Coin');
                break;
            }
            case 6: {
                $coin = 300000000000;
                session()->flash(SUCCESS, 'Đỗ hiệp vừa giành được 300,000,000,000 Coin');
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