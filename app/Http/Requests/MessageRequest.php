<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'ticket_id' => ['required', 'integer', 'gt:0', 'exists:App\Models\Ticket,id'],
            'user_id' => ['required', 'integer', 'gt:0', 'exists:App\Models\User,id'],
            'response' => ['required', "regex:/^[A-zÀ-ú :'@!$,\.#0-9]{2,400}$/"]
        ];
    }


    public function messages()
    {
        return [
            'ticket_id.required' => 'Le ticket est requis',
            'ticket_id.integer' => 'Le ticket doit etre un entier',
            'ticket_id.gt' => 'Le ticket doit etre un entier supérieur a 0',
            'ticket_id.exists' => 'Le ticket est invalide',
            'user_id.required' => 'Le user est requis',
            'user_id.integer' => 'Le user doit etre un entier',
            'user_id.gt' => 'Le user doit etre un entier supérieur a 0',
            'user_id.exists' => 'Le user est invalide',
            'response.required' => 'Votre réponse est requise',
            'response.regex' => 'Votre réponse peut seulement contenir des: . , ! - @ # $ \' des chiffres et des lettres et un longueur minimum de 2 caracteres et maximum 400',
        ];
    }
}
