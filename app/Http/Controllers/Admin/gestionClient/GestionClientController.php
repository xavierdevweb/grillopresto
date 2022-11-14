<?php

namespace App\Http\Controllers\Admin\gestionClient;

use App\Models\Role;
use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserInfoRequest;

class GestionClientController extends Controller
{

    public function index()
    {
        return view('admin.gestionClient.client-gestion');
    }



    public function show(Request $request)
    {
        if (isset($request->email))
            $user = User::with('infoUser')->where('email', $request->email)->get();
        else
            $user = User::with('infoUser')->whereRelation('InfoUser', 'telephone', $request->tel)->get();

        if (isset($user[0])) {
            return view('admin.gestionClient.search', [
                'user' => $user
            ]);
        } else
            return back()->with('noUserFound', "Aucun client n'as été trouvé");
    }





    public function update(UpdateUserInfoRequest $request)
    {
        $validatedData = $request->validated();

        $user = (object) User::where('id', $request->client_id)->first();

        $userInfo = InfoUser::where('id', (int) $user->info_user_id)->first();

        if ($request->tel !== $userInfo->telephone) {
            $response = $this->validate(
                $request,

                [
                    'tel' => ['regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/', 'required', 'unique:App\Models\InfoUser,telephone'],
                ],
                [
                    'tel.regex' => 'Le format doit etre (888-888-8888)',
                    'tel.required' => 'Le numéro de téléphone est requis',
                    'tel.unique' => 'Ce numéro est invalide ou existe déja',
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
                    'email.unique' => 'Ce email est invalide ou existe déja',
                ]
            );
        }

        $user->email = (string) $request->email;
        if (!$request->password == NULL)
            $user->password = Hash::make($request->password);
        $user->blocked_at = isset($request->blocked_at) ? NULL : $user->blocked_at;
        $user->soft_deleted = isset($request->soft_deleted) ? NULL : $user->soft_deleted;
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

        if (isset($request->blocked_at))
            return back()->with('clientAccountUnblocked', 'Le compte du client a ete debloque');
        elseif (isset($request->soft_deleted))
            return back()->with('clientAccountUndeleted', 'Le compte du client a ete récuperé');
        else
            return back()->with('successInfosChanged', 'Vos informations on été changé');
    }


    public function destroy(Request $request)
    {
        $admin = (object) User::GetLoggedUserInfo()->first();
        $client = User::where('id', $request->client_id)->first();
        $role = new Role;
        if ((int)$admin->role_id === $role->get_role_admin_3()) {
            if (isset($request->blocked_at)) {
                $client->blocked_at = date('Y-m-d h:i:s');
                $client->save();
                return back()->with('clientAccountBlocked',  "Le compte du client a ete bloqué");
            } elseif (isset($request->soft_deleted)) {
                $client->soft_deleted = date('Y-m-d h:i:s');
                $client->save();
                return back()->with('clientAccountDeleted',  "Le compte du client a ete supprimé");
            }
        }
    }
}
