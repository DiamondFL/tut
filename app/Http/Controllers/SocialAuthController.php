<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 9:16 AM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $state = request()->get('state');
        request()->session()->put('state',$state);
        session()->put('code', request()->input('code'));
        $userSocial = Socialite::driver($social)->user();
        $user = SocialAccountService::createOrGetUser($userSocial, $social);
        auth()->login($user);
        return redirect()->route('vocabularies.index');
    }
}