<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use App\Trait\UserStateManager;
use Illuminate\Support\Facades\Auth;

class ValidateUserInfo
{

    use UserStateManager;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()) {
            $user = User::GetLoggedUserInfo()->get();
            if ($user[0]->blocked_at > 1) {
                $this->checkIfUserStateIsValid($user, $request);
            }

            if ($user[0]->soft_deleted > 1) {
                $this->checkIfUserStateIsValid($user, $request);
            }

            if ($user[0]->info_user_id < 1) {
                return to_route('finish.registeration', $user[0]->id);
            }
        }

        return $next($request);
    }
}
