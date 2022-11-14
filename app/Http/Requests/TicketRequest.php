<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'order_number' => ['nullable', 'string', 'exists:App\Models\Order,order_number'],
            'ticket_type_id' => ['required', 'integer', 'gt:0', 'exists:App\Models\TicketType,id'],
            'description' => ['required', "regex:/^[A-zÀ-ú ': @!$,-.#0-9]{50,400}$/"]
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit etre une chaine de caracteres',
            'email.email' => 'Votre email doit etre du format email standard',
            'email.max' => 'Votre email doit etre d\'une longueur de 255 carateres maximum',
            'order_number.exists' => "Votre numéro de commande n'existe pas",
            'order_number.string' => 'Votre numéro de commande doit etre une chaine de caracteres',
            'ticket_type_id.required' => 'Le type de ticket est requis',
            'ticket_type_id.integer' => 'Le type de ticket doit etre un entier',
            'ticket_type_id.gt' => 'Le type de ticket doit etre un entier supérieur a 0',
            'ticket_type_id.exists' => 'Le type de ticket est invalide',
            'description.required' => 'Votre description est requise',
            'description.regex' => "Votre description peut seulement contenir des: . , - @ # ! $ \' des chiffres et des lettres et un longueur minimum de 50 caracteres et maximum 400",
        ];
    }
}
