<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneRequest extends FormRequest
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
            'nom'=> 'required|max:100',
            'prenom'=> 'required|max:100',
            'statut'=> 'required',
            'photo'=> 'required',
            'age'=> 'required|numeric',
            'sexe'=> 'required',
            
                'hobbie_nom' => 'nullable|array',
                'hobbie_nom.*' => 'required_with:hobbie_description.*|string|max:100',
            
                'hobbie_description' => 'nullable|array',
                'hobbie_description.*' => 'required_with:hobbie_nom.*|string|max:255',
           
            
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est requis',
            'nom.max' => 'Le nom ne doit pas dépasser 100 caractères',
            'prenom.max' => 'Le prénom ne doit pas dépasser 100 caractères',
            'prenom.required' => 'Le prénom est requis',
            'statut.required' => 'Le statut est requis',
            'photo.required' => 'La photo est requise',
            // 'photo.url' => 'La photo doit être une URL valide',
            'age.numeric' => 'L\'âge doit être un nombre',
            'age.required' => 'L\'âge est requis',
            'sexe.required' => 'Le sexe est requis',
        ];
    }
}
