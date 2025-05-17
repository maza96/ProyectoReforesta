<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspeciesPost extends FormRequest
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
            'nombre_cientifico' => 'required|string|max:255|unique:especies,nombre_cientifico,' . $this->route('especy') . ',id',
            'descripcion' => 'required|string|max:1000',
            'clima' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'tiempo_adulto' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'enlace' => 'nullable|url|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre_cientifico.required' => 'El nombre científico es obligatorio.',
            'nombre_cientifico.unique' => 'El nombre científico ya está en uso.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'clima.required' => 'El clima es obligatorio.',
            'region.required' => 'La región es obligatoria.',
            'tiempo_adulto.required' => 'El tiempo adulto es obligatorio.',
            'tiempo_adulto.integer' => 'El tiempo adulto debe ser un número entero.',
            'tiempo_adulto.min' => 'El tiempo adulto debe ser al menos 1.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'foto.max' => 'La imagen no puede exceder los 2MB.',
            'enlace.url' => 'El enlace debe ser una URL válida.',
        ];
    }
}
