<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioPost extends FormRequest
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
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:usuarios,nick,' . $this->route('usuario') . ',id',  // Excluir el usuario actual
            'email' => 'required|email|max:255|unique:usuarios,email,' . $this->route('usuario') . ',id',  // Excluir el usuario actual
            'karma' => 'nullable|integer|min:0',
            'avatar' => 'nullable|image|max:2048',
        ];
        
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:4|confirmed';
        }
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['password'] = 'nullable|string|min:4|confirmed';
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'nick.required' => 'El nick es obligatorio.',
            'nick.unique' => 'El nick ya está en uso.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'avatar.image' => 'El avatar debe ser una imagen.',
            'avatar.max' => 'El avatar no puede pesar más de 2MB.',
            'karma.integer' => 'El karma debe ser un número entero.',
            'karma.min' => 'El karma no puede ser negativo.',
        ];
    }
}
