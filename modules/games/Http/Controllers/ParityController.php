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
        return view('gm::parity.index');
    }
    public function play(Request $request)
    {
        $user = auth()->user();
        $money = $user->coin;
        $input = $request->all();
        $coin = (int) $input['coin'];
        if($money <= 0)
        {
            session()->flash('error', "Số coin của đổ hiệp đã hết. Vui lòng đào coin({$money}) để chơi tiếp");
            return redirect()->back();
        }
        if($coin > $money)
        {
            session()->flash('error', 'Độ hiệp không thể đặt số coin lớn hơn tải sản hiện có');
            return redirect()->back();
        }
        $result = rand(1, 6);
        if((boolean)$input['betting'] !== ($result % 2 === 0) ) {
            $money -= $coin;
            session()->flash('error', "Chúc đỗ hiệp may mắn lần sau.
             Điểm xí ngầu là {$result}. Số coin hiện tại {$money}");
        } else {
            $money += $coin;
            session()->flash('success', "Chúc mừng đỗ thánh đã giành chiến thắng. Giành được {$coin} coin");
        }
        $user->coin = $money;
        $user->save();
        return redirect()->back();

    }
    public function result()
    {

    }
}