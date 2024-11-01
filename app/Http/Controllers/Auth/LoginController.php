<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\TwoFactorCodeNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->two_factor) {
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCodeNotification());
        }
    }

    public function handleProviderCallbackSocialLogin(string $driver)
    {
        $user = Socialite::driver($driver)->stateless()->user();

        $authUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt($user->getId()),
                'social_driver' => $driver,
                'social_driver_id' => $user->getId(),
            ]
        );

        auth()->login($authUser, true);

        return redirect($this->redirectTo());
    }

    public function redirectTo()
    {
        if (auth()->user()->two_factor) {
            return route('two-factor.login');
        }

        if (!auth()->user()->is_admin) {
            return route('site.home.index');
        }

        return $this->redirectTo;
    }

}
