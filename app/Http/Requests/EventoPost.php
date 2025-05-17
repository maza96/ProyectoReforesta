<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoPost extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'tipo_evento' => 'required|string|max:255',
            'tipo_terreno' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'anfitrion_id' => 'required|exists:usuarios,id',
            'participantes' => 'array',
            'participantes.*' => 'exists:usuarios,id',
            'especies' => 'array',
            'especies.*' => 'nullable|integer|min:0',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del evento es obligatorio.',
            'fecha.required' => 'La fecha del evento es obligatoria.',
            'ubicacion.required' => 'La ubicación del evento es obligatoria.',
            'tipo_evento.required' => 'El tipo de evento es obligatorio.',
            'tipo_terreno.required' => 'El tipo de terreno es obligatorio.',
            'descripcion.required' => 'La descripción del evento es obligatoria.',
            'descripcion.max' => 'La descripción no puede exceder los 1000 caracteres.',
            'anfitrion_id.required' => 'El anfitrión es obligatorio.',
            'anfitrion_id.exists' => 'El anfitrión seleccionado ya no existe.',
            'especies.array' => 'Las especies deben ser un arreglo.',
            'especies.*.integer' => 'Cada especie debe ser un número entero.',
            'especies.*.min' => 'Cada especie debe ser mayor o igual a 0.',
        ];
    }
}
