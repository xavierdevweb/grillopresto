<?php

namespace App\Trait;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;


trait UserStateManager
{

    public function customLogout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    
    public function checkIfUserStateIsValid($user , $request, $from = null)
    {


        if ($user->soft_deleted > 1) {
            $this->customLogout($request);
            if ($from == "TraitValidateLoginInfo")
                return ["deletedTrue" => "Votre compte a supprimé le " . $user->blocked_at];
            return to_route('login')->withErrors(['accountErrorstatus' => "Votre compte a été supprimé le " . $user->soft_deleted]);
            exit;
        }
        if ($user->blocked_at > 1) {
            $this->customLogout($request);
            if ($from == "TraitValidateLoginInfo")
                return ["blockedTrue" => "Votre compte a suspendu le " . $user->blocked_at];
            return to_route('login')->withErrors(['accountErrorstatus' => "Votre compte a suspendu le " . $user->blocked_at]);
            exit;
        }
    }
}
