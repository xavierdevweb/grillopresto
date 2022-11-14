<?php

namespace App\Trait;


use App\Models\User;
use Illuminate\Http\Request;
use App\Trait\UserStateManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth as AuthFoundation;

trait ValidateLoginInfo
{
    use AuthFoundation\RedirectsUsers, AuthFoundation\ThrottlesLogins, UserStateManager;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {

        return $this->guard()->attempt(
            $this->credentials($request),
            $request->boolean('remember')
        );
    }

    protected function credentials(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ],
            [
                'email.required' => 'Votre email est requis',
                'email.string' => 'Votre email doit etre une chaine de caracteres',
                'email.email' => 'Votre email doit etre du format email standard',
                'email.max' => 'Votre email doit etre d\'une longueur de 255 carateres maximum',
                'password.required' => 'Votre mot de passe est requis',
                'password.string' => 'Votre mot de passe doit etre une chaine de caracteres',
                'password.min' => 'Votre mot de passe doit etre d\'une longueur de 8 caracteres minimum'
            ]
        );

        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }


        $userInfos = User::getLoggedUserInfo()->get();
        $response = $this->checkIfUserStateIsValid($userInfos[0], $request, "TraitValidateLoginInfo");
        if (isset($response['blockedTrue'])) {
            return to_route('login')->withErrors(['accountErrorstatus' => "Votre compte a suspendu le " . $userInfos[0]->blocked_at]);
        }
        if (isset($response['deletedTrue'])) {
            return to_route('login')->withErrors(['accountErrorstatus' => "Votre compte a été supprimé le " . $userInfos[0]->soft_deleted]);
        }

        if ($request->wantsJson()) {
            return new JsonResponse([], 204);
        } elseif ($userInfos[0]->info_user_id <= 0) {
            return redirect()->route('finish.registeration', ['user' => $userInfos[0]->id]);
        } elseif (session()->has('cart')) {
            return redirect()->route('cart');
        } elseif ($userInfos[0]->role->role == "Admin_1" || $userInfos[0]->role->role == "Admin_2" || $userInfos[0]->role->role == "Admin_3") {
            return to_route('admin.ticket.index');
        } else {
            return redirect()->intended($this->redirectPath());
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.noMatch')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
