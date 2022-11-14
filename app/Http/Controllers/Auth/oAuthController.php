<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Trait\UserStateManager;
use App\Http\Requests\OAuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class oAuthController extends Controller
{

    use UserStateManager;

    public function returnViewToCompleteRegisteration($user)
    {

        $userInfos = User::where('id', $user)->get();
        return view('auth.oAuthRegister', ['userInfos' => $userInfos]);
    }


    public function updateOAuthUser(OAuthRequest $request)
    {
        $validatedData = $request->validated();
      
        $userinfos = User::GetLoggedUserInfo()->get();

        $newUser = InfoUser::create([
            'prenom' => $request['prenom'],
            'nom' => $request['nom'],
            'telephone' => $request['tel'],
            'rue' => $request['rue'],
            'no_porte' => $request['noPorte'],
            'code_postal' => $request['zip_code'],
            'ville' => $request['ville']
        ]);

        $userinfos->toQuery()->update(['info_user_id' => $newUser->id]);

        return redirect('/');
    }
}
