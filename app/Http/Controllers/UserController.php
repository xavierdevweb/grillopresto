<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Trait\UserStateManager;
use App\Http\Requests\OAuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\UpdateUserInfoRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use UserStateManager;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userInfo = (object) User::GetLoggedUserInfo()->get();

        return view('user.user-infos', ['user' => $userInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserInfoRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = (object) User::GetLoggedUserInfo()->first();

        $userInfo = InfoUser::where('id', (int) $user->info_user_id)->first();

        if ($request->tel !== $userInfo->telephone) {
            $response = $this->validate(
                $request,

                [
                    'tel' => ['regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/', 'required', 'unique:App\Models\InfoUser,telephone'],
                ],
                [
                    'tel.regex' => 'Le format doit etre (888-888-8888)',
                    'tel.required' => 'Le num??ro de t??l??phone est requis',
                    'tel.unique' => 'Ce num??ro est invalide ou existe d??ja',
                ]
            );
        }
        if ($request->email !== $user->email) {
            $response = $this->validate(
                $request,

                [
                    'email' => ['unique:App\Models\User,email'],
                ],
                [
                    'email.unique' => 'Ce email est invalide ou existe d??ja',
                ]
            );
        }



        $user->email = (string) $request->email;


        if (empty($request->activePassword) && !empty($request->password) && !empty($request->password_confirmation)) {
            return redirect()->back()->withErrors(['password' => 'Vos devez entrer votre mot de passe actuel pour effectu?? un changement']);
        }

        if (!empty($request->activePassword) && (empty($request->password) || empty($request->password_confirmation))) {
            return redirect()->back()->withErrors(['password' => 'Vous devez completez les champs requis pour effectu?? un changement']);
        }
        
        if (!empty($request->activePassword)) {
            if (password_verify($request->activePassword, $user->password)) {
                if ($request->password === $request->password_confirmation) {
                    $user->password = (string) Hash::make($request->password);
                } else {
                    return redirect()->back()->withErrors(['password' => 'La combinaisons de mot de passe ne correspond pas']);
                }
            } else {
                return redirect()->back()->withErrors(['activePassword' => 'Votre mot de passe ne correspond pas']);
            }
        }

        $userInfo->prenom = (string) $request->prenom;
        $userInfo->nom = (string) $request->nom;
        $userInfo->rue = (string) $request->rue;
        $userInfo->no_porte = (int) $request->noPorte;
        $userInfo->appartement = (int) $request->appartement;
        $userInfo->code_postal = (string) $request->zip_code;
        $userInfo->ville = (string) $request->ville;
        $userInfo->telephone = (string) $request->tel;
        $user->save();
        $userInfo->save();

        return back()->with('successInfosChanged', 'Vos informations on ??t?? chang??');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Excesive checking making sure someone is not trynna make so sketchy shit
        $user = (object) User::GetLoggedUserInfo()->first();
        if (((int)$user->id === (int) $id) &&
            ((int)$request->active_logged_user === (int)$user->id) &&
            ((int)$request->active_logged_user === (int) $id)
        ) {
            $user->soft_deleted = date('Y-m-d h:i:s');
            $user->save();

            $this->checkIfUserStateIsValid($user, $request);
            return to_route('login')->withErrors(['accountErrorstatus' => "Votre compte a ??t?? supprim?? le " . $user->soft_deleted]);
        }
    }
}
