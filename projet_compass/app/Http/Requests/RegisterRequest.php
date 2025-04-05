<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
            'email' => 'required|email',
            'mdp' => 'min:6|required_with:mdp_confirmation|same:mdp_confirmation',
            'mdp_confirmation' => 'min:6'
        ];
    }

    public function messages () {
        return [
            'nom.required'=> 'Un nom est requis',
            'nom.max'=> 'Le nom doit contenir au plus 50 caracteres',
            'prenom.required'=> 'Un nom est requis',
            'prenom.max'=> 'Le nom doit contenir au plus 50 caracteres',
            'email.required'=> 'Une adresse courriel est requis',
            'email.email'=> "L'adresse courriel est invalide",
            'mdp.min'=> "Le mot de passe doit etre compose d'au moins 6 caracteres",
            'mdp.required_with'=> 'veuillez confirmer le mot de passe',
            'mdp.same'=> 'Le mot de passe est la confirmation de mot de passe doit etre pareil',
            'mdp_confirmation.min'=> 'La confirmation de mot de passe doit contenir le meme nombre de caracteres que le mot de passe'
        ];
    }
}
