<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'nom' => 'required',
            'prenom' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];
    }

    public function messages () {
        return [
            'nom.required'=> 'Un nom est requis',
            'prenom.required'=> 'Un prenom est requis',
            'email.required'=> 'Une adresse courriel est requis',
            'email.email'=> "L'adresse courriel est invalide",
            'password.min'=> "Le mot de passe doit etre compose d'au moins 6 caracteres",
            'password.required_with'=> 'veuillez confirmer le mot de passe',
            'password.same'=> 'Le mot de passe est la confirmation de mot de passe doit etre pareil',
            'password_confirmation.min'=> 'La confirmation de mot de passe doit contenir le meme nombre de caracteres que le mot de passe'
        ];
    }

}
