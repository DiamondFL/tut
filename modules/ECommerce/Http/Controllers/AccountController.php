<?php
/**
 * Created by PhpStorm.
 * User: YingDiamond
 * Date: 2/22/2015
 * Time: 9:10 AM
 */

namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AccountController extends Controller
{
    public function getSignIn()
    {
        return view('eco::account.signin');
    }

    public function postSignIn()
    {
        $login = array(
            'email' => 'required|email',
            'password' => 'required|min:6|max:60'
        );
        $validator = Validator::make(Input::all(), $login);
        if ($validator->fails()) {
            //Redicrect to the sign in page
            return Redirect::route('account-sign-in')
                ->withErrors($validator)
                ->withInput();
        } else {

            $remember = (Input::has('remember')) ? true : false;
            //Attempt user sign in
            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                //'active'=>1
            ), $remember);
            if ($auth) {
                Session::put('email', Input::get('email'));
                return Redirect::intended('/');
            } else return Redirect::route('account-sign-in')
                ->with('global', 'Email/password sai, hoặc tài khoản chưa kích hoạt');
        }
        return Redirect::route('account-sign-in')
            ->with('global', 'Có vấn đề về đăng nhập. Bạn đã kích hoạt tài khoản chưa?');
    }

    public function getSignOut()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    public function getCreate()
    {
        return view('eco::account.create');
    }

    public function postCreate()
    {
        //echo Input::get('fullName');exit();
        $rules = array(
            'email' => 'required|email|max:50|unique:users',
            'fullName' => 'required|min:3|max:20',
            'password' => 'required|min:6|max:60',
            'password_confirmation' => 'required|same:password',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::route('account-create')
                ->withErrors($validator)->with('global', 'Error register')
                ->withInput();
        } else {
            $email = Input::get('email');
            $fullName = Input::get('fullName');
            $password = Input::get('password');

            //Activation code

            $code = str_random(60);
            $users = array(
                'email' => $email,
                'fullname' => $fullName,
                'password' => Hash::make($password),
                'code' => $code,
                'active' => 0
            );
            //tự động đã có hàm create không cần viết lại
            $create = User::create($users);
            if ($create) {
                Mail::send(
                //----------- Nội dung email
                    'emails.auth.activate',
                    array(
                        //-------------Biến truyền vào nội dung
                        'link' => URL::route('account-activate', $code),//----------Link email
                        'fullName' => $fullName),//---------------tên tài khoản
                    // Cấu hình địa chỉ nhận và tên người nhận, chủ đề
                    function ($message) use ($create) {
                        $message->to($create->email, $create->fullName)//địa chỉ gửi và tên người nhận
                        ->subject('Kích hoạt tài khoản');
                    });
                return Redirect::route('home')
                    ->with('global', 'Tài khoản của bạn đã được tạo! Chúng tôi đã gửi bạn một email để bạn kích hoạt tài khoản!');
            }
        }
    }

    public function getActivate($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0);
        if ($user->count()) {
            $user = $user->first();
            //Update user to active state
            $user->active = 1;
            $user->code = '';
            if ($user->save()) {
                return Redirect::route('home')
                    ->with('global', 'Kích hoạt thành công! Tài khoản của bạn có thể đăng nhập');
            }
        }
        return Redirect::route('home')
            ->with('global', 'Chúng tôi không thể kích hoạt tài khoản. Thử lại sau');
    }

    public function getChangePassword()
    {
        return view('eco::account.password');
    }

    public function postChangePassword()
    {
        $ruler = array(
            'oldPassword' => 'required|min:6|max:60',
            'password' => 'required|min:6|max:60',
            'password_confirmation' => 'required|min:6|max:60|same:password'
        );
        $validator = Validator::make(Input::all(), $ruler);
        if ($validator->fails()) {
            //redirect
            return Redirect::route('account-change-password')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::find(Auth::user()->id);
            $oldPassword = Input::get('oldPassword');
            $password = Input::get('password');
            if (Hash::check($oldPassword, $user->getAuthPassword())) {
                //password user provided matches!
                $user->password = Hash::make($password);
                if ($user->save()) {
                    return Redirect::route('home')->with('global', 'Mật khẩu của bạn đã được thay đổi.');
                }
            } else {
                return Redirect::route('account-change-password')
                    ->with('global', 'Mật khẩu cũ của bạn chưa chính xác.');
            }
        }
        return Redirect::route('account-change-password')
            ->with('global', 'Mật khẩu của bạn không thể thay đổi');
    }

    public function getForgotPassword()
    {
        return view('eco::account.forgot');
    }

    public function postForgotPassword()
    {
        $ruler = array(
            'email' => 'required|email'
        );
        $validator = Validator::make(Input::all(), $ruler);
        if ($validator->fails()) {
            return Redirect::route('password.request')
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = User::where('email', '=', Input::get('email'));
            if ($user->count()) {
                $user = $user->first();
                //Generate a new code and password
                $code = str_random(60);
                $password = str_random(10);
                $user->code = $code;
                $user->password_temp = Hash::make($password);
                if ($user->save()) {
                    Mail::send('emails.auth.forgot', array(
                        'url' => URL::route('account-recover', $code),
                        'fullName' => $user->fullName,
                        'password' => $password
                    ), function ($message) use ($user) {
                        $message->to($user->email, $user->fullName)->subject('Mật khẩu mới của bạn');
                    });
                    return Redirect::route('home')
                        ->with('global', 'Chúng tôi đã gửi mật khẩu mới tới email của bạn.');
                }
            }
        }
        return Redirect::route('password.request')
            ->with('global', 'Could not request new password');
    }

    public function getRecover($code)
    {
        $user = User::where('code', '=', $code)
            ->where('password_temp', '!=', '');
        if ($user->count()) {
            $user = $user->first();
            $user->password = $user->password_temp;
            $user->code = '';
            $user->password_temp = '';
            if ($user->save()) {
                return Redirect::route('home')
                    ->with('global', 'Bạn đã kích hoạt và bạn có thể đăng nhập với mật khẩu mới.');
            }
        }
        return Redirect::route('home')
            ->with('global', 'Không thể lấy lại mật khẩu');
    }
} 