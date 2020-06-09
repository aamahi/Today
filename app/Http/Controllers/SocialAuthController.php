<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialAuthService;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAuthService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);

        return redirect()->to('/');
    }
}
