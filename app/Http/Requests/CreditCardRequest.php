<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-zÀ-ú -]{2,75}$/',
            'card_number' => ['required','regex:/^\d{4}[-]\d{4}[-]\d{4}[-]\d{3,4}$/'],
            'month' => ['required', 'regex:/^0[1-9]|1[0-2]$/'],
            'year' => ['required', 'regex:/^202[2-9]$/'],
            'cvc' => ['required', 'regex:/^\d{3,4}$/'],
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'appartement' => ['integer', 'nullable', 'gte:0'],
            'tel' => ['required', 'regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/'],
            'rue' => ['required','regex:/^[A-zÀ-ú -]{2,50}$/', 'string'],
            'noPorte' => ['required', 'integer'],
            'zip_code' => ['required', 'regex:/^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/'],
            'ville' => ['required', 'string', 'regex:/^[A-zÀ-ú -]{2,50}$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.regex' => 'Votre nom doit seulement contenir des lettres et -',
            'card_numbert.regex' => 'Le numéro de carte de credit doit dans le format 0000-0000-0000-0000',
            'card_number.required' => 'Le numéro de carte de credit est requis',
            'month.required' => 'Le mois de la carte est requis',
            'month.regex' => 'Le mois doit se situer entre 01-12',
            'year.regex' => "L'année de la carte doit se situer entre 2022 et 2030",
            'year.required' => "L'année de la carte est requise",
            'cvc.required' => 'Le code de sécurité est requis',
            'cvc.regex' => 'Le code de securite doit etre composer de 3 ou 4 chiffres seulement',
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit être une chaine de caractères',
            'email.email' => 'Votre email doit être du format email standard',
            'email.max' => 'Votre email doit être d\'une longueur de 255 caractères maximum',
            'tel.required' => 'Votre numéro de téléphone est requis',
            'tel.regex' => 'Le format doit etre (888-888-8888)',
            'prenom.required' => 'Votre prénom est requis',
            'prenom.string' => 'Votre prénom doit être une chaine de caracteres',
            'prenom.max' => 'Votre prénom doit être d\'une longueur de 255 caractères maximum',
            'nom.required' => 'Votre nom est requis',
            'nom.string' => 'Votre nom doit être une chaine de caracteres',
            'nom.max' => 'Votre nom doit être d\'une longueur de 255 caractères maximum',
            'rue.required' => 'Votre rue est requise',
            'rue.string' => 'Votre rue doit est une chaine de caractère',
            'rue.regex' => 'La rue doit seulement contenir des lettres et -',
            'noPorte.required' => 'Votre porte est requise',
            'noPorte.integer' => 'Votre porte doit être constitué seulement de chiffre',
            'zip_code.required' => 'Votre code postal est requis',
            'zip_code.regex' => 'Votre code postal n\'est pas valide',
            'zip_code.regex' => 'Format (A1B-2C3) ou (A1B 2C3) seulement',
            'ville.required' => 'Votre ville est requis',
            'ville.string' => 'Votre ville doit être une chaine de caracteres',
            'ville.max' => 'Votre ville doit être d\'une longueur de 255 caractères maximum',
            'ville.regex' => 'La ville doit seulement contenir des lettres et -',
            'appartement.integer' => "L'appartement doit seulement contenir des chiffres",
            'appartement.gte' => "L'appartement doit etre superieur a 0",
        ];
    }
}
