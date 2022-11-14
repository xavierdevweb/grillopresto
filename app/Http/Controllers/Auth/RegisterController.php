<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\InfoUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Trait\RolesAvailable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use RolesAvailable;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // **** A REMETTRE ***
        // CECI EMPECHAIT DALLER SUR REGISTER SI ON EST LOG
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prenom' => ['required', 'regex:/^[A-zÀ-ú -]{2,30}$/'],
            'nom' => ['required', 'regex:/^[A-zÀ-ú -]{2,50}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed'],
            'email_confirmation' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,50}$/'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'tel' => ['regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/', 'required', 'unique:App\Models\InfoUser,telephone'],
            'zip_code' => ['regex:/^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/', 'required'],
            'noPorte' => ['integer', 'gt:0', 'required'],
            'appartement' => ['integer', 'nullable', 'gt:0'],
            'ville' => ['regex:/^[A-zÀ-ú -]{2,50}$/', 'required'],
            'rue' => ['regex:/^[A-zÀ-ú -]{2,50}$/', 'required'],
            'role_id' => ['integer', 'gt:0', 'exists:App\Models\Role,role']
        ], [
            'prenom.regex' => 'Votre prenom doit seulement contenir des lettres et -',
            'prenom.required' => 'Votre prenom est requis',
            'nom.required' => 'Votre nom est requis',
            'nom.regex' => 'Votre nom doit seulement contenir des lettres et -',
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit etre une chaine de caracteres',
            'email.email' => 'Votre email doit etre du format email standard',
            'email.max' => 'Votre email doit etre d\'une longueur de 255 carateres maximum',
            'email.confirmed' => 'Votre confirmation d\'email doit correspondre',
            'password.required' => 'Votre mot de passe est requis',
            'password.regex' => 'Minimum 8 caractères, maximum 50 caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@ $ ! % * ? &)',
            'password.string' => 'Votre mot de passe doit etre une chaine de caracteres',
            'password.min' => 'Votre mot de passe doit etre d\'une longueur de 8 caracteres minimum',
            'password.confirmed' => 'Votre confirmation de password doit correspondre',
            'password_confirmation.required' => 'La confirmation du mot de passe est requis',
            'password_confirmation.string' => 'La confirmation du mot de passe doit etre une chaine de caracteres',
            'password_confirmation.min' => 'La confirmation du mot de passe doit etre d\'une longueur de 8 carateres minimum',
            'password_confirmation.confirmed' => 'La confirmation du confirmation de password doit correspondre',
            'tel.regex' => 'Le format doit etre (888-888-8888)',
            'tel.required' => 'Le numéro de téléphone est requis',
            'tel.unique' => 'Ce numéro est invalide ou existe déja',
            'zip_code.regex' => 'Format (A1B-2C3) ou (A1B 2C3) seulement',
            'noPorte.integer' => 'Seuelement les chiffres sont accepté',
            'noPorte.gt' => 'Valeur de 0 ou supérieur seulement',
            'noPorte.required' => 'Votre no Porte est requis',
            'appartement.integer' => 'Seulement les chiffres sont accepté',
            'appartement.gt' => 'Valeur de 0 ou supérieur seulement',
            'ville.regex' => 'La ville doit seulement contenir des lettres et -',
            'ville.required' => 'La ville est requise',
            'rue.regex' => 'La rue doit seulement contenir des lettres et -',
            'rue.required' => 'La rue est requise',
            'role_id.integer' => 'Le role doit etre un chiffre entier',
            'role_id.gt' => 'Le role doit etre une valeur supérieur a 0',
            'role_id.exists' => 'Le role n\'existe pas'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $roles = new Role;

        $infoUser = InfoUser::create([
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'telephone' => $data['tel'],
            'rue' => $data['rue'],
            'no_porte' => $data['noPorte'],
            'code_postal' => $data['zip_code'],
            'ville' => $data['ville']
        ]);

        $user = User::create([
            'info_user_id' => $infoUser->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' =>  $roles->get_role_client()
        ]);

        return $user;
    }
}
