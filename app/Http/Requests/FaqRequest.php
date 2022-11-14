<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => ['string', 'required', 'regex:/^[A-zÀ-ú \'@$,-.#0-9]{5,120}$/'],
            'answer' => ['string', 'required', 'regex:/^[A-zÀ-ú \'@$,-.#0-9]{5,500}$/'],
            'faq_theme_id' => ['integer', 'gt:0', 'required', 'exists:App\Models\FaqTheme,id'],
            'is_active' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'question.string' => 'La question doit être une chaîne de charactères',
            'question.required' => 'Svp remplir le champ question',
            'question.regex' => 'Le champ question ne peut contenir que : ., - @ # $ \' des chiffres et des lettres et un longueur minimum de 5 caracteres et maximum 120',
            'answer.string' => 'La réponse doit être une chaîne de charactères',
            'answer.required' => 'Svp remplir le champ réponse',
            'answer.regex' => 'Le champ réponse ne peut contenir que : ., - @ # $ \' des chiffres et des lettres et un longueur minimum de 5 caracteres et maximum 120', 
            'faq_theme_id.integer' => 'Seulement les chiffres sont accepté',
            'faq_theme_id.gt' => 'Valeur de 0 ou supérieur seulement',
            'faq_theme_id.required' => 'Valeur de 0 ou supérieur seulement',
            'faq_theme_id.exists' => 'Le role n\'existe pas',
            'is_active.boolean' => 'Doit être vrai ou faux'
        ];
    }
}
