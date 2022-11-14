<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
{
    // protected $redirect = 'login';
    // protected function getRedirectUrl()
    // {
    //     $url = $this->redirector->getUrlGenerator();
    //     return back()->withInput();
    // }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'prenom' => 'required|regex:/^[A-zÀ-ú -]{2,30}$/',
            'nom' => ['required', 'regex:/^[A-zÀ-ú -]{2,50}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed'],
            'email_confirmation' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed', "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%\.\,#*?&])[A-Za-z\d@$#!\.\,%*?&]{8,}$/"],
            'password_confirmation' => ['nullable', 'string', 'min:8'],
            'zip_code' => ['regex:/^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/', 'required'],
            'noPorte' => ['integer', 'gt:0', 'required'],
            'appartement' => ['integer', 'nullable', 'gte:0'],
            'ville' => ['regex:/^[A-zÀ-ú -]{2,50}$/', 'required'],
            'rue' => ['regex:/^[A-zÀ-ú -]{2,50}$/', 'required'],
            'role_id' => ['integer', 'gt:0', 'exists:App\Models\Role,role']
        ];
    }

    public function messages()
    {
        return [
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
            'password.regex' => 'Minimum 8 caractères, maximum 50 caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@ . , # $ ! % * ? &)',
            'password.string' => 'Votre mot de passe doit etre une chaine de caracteres',
            'password.min' => 'Votre mot de passe doit etre d\'une longueur de 8 caracteres minimum',
            'password.confirmed' => 'Votre confirmation de password doit correspondre',
            'password_confirmation.required' => 'La confirmation du mot de passe est requis',
            'password_confirmation.string' => 'La confirmation du mot de passe doit etre une chaine de caracteres',
            'password_confirmation.min' => 'La confirmation du mot de passe doit etre d\'une longueur de 8 carateres minimum',
            'password_confirmation.confirmed' => 'La confirmation du confirmation de password doit correspondre',
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
        ];
    }
}
