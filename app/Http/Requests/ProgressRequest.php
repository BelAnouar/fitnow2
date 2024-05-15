<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgressRequest extends FormRequest
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
            'poids' => 'required|numeric',
            'Poitrine' => 'required|numeric',
            'Mollet' => 'required|numeric',
            'Bras' => 'required|numeric',
            'Hauteur' => 'required|numeric',
            'PoidsLeve' => 'required|numeric',
            'TempsDeCourse' => 'required|numeric',
        ];
    }
}
