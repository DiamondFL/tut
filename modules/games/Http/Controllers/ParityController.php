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

    public function index()
    {
        return view('gm::parity.index');
    }

    public function play(Request $request)
    {
        $user = auth()->user();
        $money = $user->coin;
        $input = $request->all();
        $coin = (int)$input[COIN];

        if ($money <= 0) {
            session()->flash('error', "Số coin của đổ hiệp đã hết. Vui lòng đào coin để chơi tiếp");
            return redirect()->back();
        }
        if ($coin > $money) {
            session()->flash(ERROR, 'Độ hiệp không thể đặt số coin lớn hơn tải sản hiện có');
            return redirect()->back();
        }
        $number = rand(1, 6);
        $result = ($number % 2 === 0);
        if ((boolean)$input[BETTING] !== $result) {
            $money -= $coin;
            session()->forget(SUCCESS);
            session()->flash(ERROR, "Chúc đỗ hiệp may mắn lần sau.");
        } else {
            $money += $coin;
            session()->forget(ERROR);
            session()->flash(SUCCESS, "Chúc mừng đỗ thánh đã giành chiến thắng. Giành được {$coin} coin");
        }

        $user->coin = $money;
        $user->save();

        return view('gm::parity.index', compact('result', 'number'))->with($input);
    }

    public function result()
    {

    }
}