<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/'],
            'street' => ['required', 'string'],
            'door' => ['required', 'integer'],
            'zip' => ['required', "regex:/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/"],
            'town' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit être une chaine de caractères',
            'email.email' => 'Votre email doit être du format email standard',
            'email.max' => 'Votre email doit être d\'une longueur de 255 caractères maximum',
            'tel.required' => 'Votre numéro de téléphone est requis',
            'tel.regex' => 'Votre numéro de téléphone n\'est pas valide',
            'firstName.required' => 'Votre prénom est requis',
            'firstName.string' => 'Votre prénom doit être une chaine de caracteres',
            'firstName.max' => 'Votre prénom doit être d\'une longueur de 255 caractères maximum',
            'lastName.required' => 'Votre nom est requis',
            'lastName.string' => 'Votre nom doit être une chaine de caracteres',
            'lastName.max' => 'Votre nom doit être d\'une longueur de 255 caractères maximum',
            'street.required' => 'Votre rue est requise',
            'street.string' => 'Votre rue doit est une chaine de caractère',
            'door.required' => 'Votre porte est requise',
            'door.integer' => 'Votre porte doit être constitué seulement de chiffre',
            'zip.required' => 'Votre code postal est requis',
            'zip.regex' => 'Votre code postal n\'est pas valide',
            'town.required' => 'Votre ville est requis',
            'town.string' => 'Votre ville doit être une chaine de caracteres',
            'town.max' => 'Votre ville doit être d\'une longueur de 255 caractères maximum',
        ];
    }
}

