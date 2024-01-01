<?php

namespace App\Http\Requests\car;

use Illuminate\Foundation\Http\FormRequest;

class form extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'registration'=>['required'],
            'type_car'=>['required'],
            'brand_car'=>['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'registration.required' => 'L\' immatriculation est requis',
            'type_car.required' => 'Le type du camion est requis',
            'brand_car.required' => 'La marque du camion est requise',
        ];
    }
}
