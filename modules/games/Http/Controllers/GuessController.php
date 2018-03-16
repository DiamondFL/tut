<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/15/2018
 * Time: 10:16 PM
 */

namespace Games\Http\Controllers;


use Illuminate\Http\Request;

class GuessController
{
    public function index() {
        return view('gm::guess.index');
    }
    public function play(Request $request)
    {
        $user = auth()->user();
        $money = $user->coin;
        $input = $request->all();
        $coin = (int) $input[COIN];

        if($money <= 0)
        {
            session()->flash(ERROR, 'Số coin của đổ hiệp đã hết. Vui lòng đào coin để chơi tiếp');
            return redirect()->back();
        }
        if($coin > $money)
        {
            session()->flash(ERROR, 'Độ hiệp không thể đặt số coin lớn hơn tải sản hiện có');
            return redirect()->back();
        }
        $result = rand(1, 6);
        if($result != $input['betting']) {
            $money -= $coin;
            session()->forget(SUCCESS);
            session()->flash(ERROR, "Chúc đỗ hiệp may mắn lần sau. Điểm xí ngầu là {$result}.");
        } else {
            $coin *= 5 ;
            $money += $coin;
            session()->forget(ERROR);
            session()->flash(SUCCESS, "Chúc mừng đỗ thánh đã giành chiến thắng. Giành được {$coin} coin");
        }

        $user->coin = $money;
        $user->save();
        return view('gm::guess.index')->with($input);
    }
}