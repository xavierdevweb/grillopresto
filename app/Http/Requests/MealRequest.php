<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'ingredient' => ['max:64'],
            'description' => ['required', 'string', 'max:512'],
            'image' => ['required', 'file', 'image', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.string' => 'Le nom doit être une chaine de caractères.',
            'name.max' => 'Le nom doit être de 255 caractères maximum.',
            'ingredient.string' => 'Les ingrédients doivent être une chaine de caractères.',
            'ingredient.max' => 'Les ingrédients doivent être de 64 caractères maximum.',
            'description.required' => 'La description est requis.',
            'description.string' => 'La description doit être une chaine de caractères.',
            'description.max' => 'La description doit être de 512 caractères maximum.',
            'image.required' => 'L\'image est requis.',
            'image.file' => 'Le fichier doit être une image.',
            'image.image' => 'Le fichier doit être sous le format : jpg, jpeg, png, bmp, gif, svg, ou webp.',
            'image.max' => 'L\'image doit être moins de 2GB.'
        ];
    }
}
