<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>'required|string|max:50',
            'lastnames' =>'required|string|max:50',
            'email' =>'required|email|unique:users,email,'.auth()->id(),
            'gender' =>'required|in:masculino, femenino',
            'address' =>'required|string',
            'phone' =>'required|string',
            'country_id' =>'required',
        ];
    }

    public function message(): array
    {
        return [
            'name.required' =>'El nombre del usuario es requerido',
            'name.max' =>'El nombre exede la longitud de caracteres',
            'lastname.required' =>'El apellido del usuario es requerido',
            'lastname.max' =>'El apellido exede la longitud de caracteres',
            'email.required' =>'El correo electrónico es requerido',
            'email.email' =>'El correo electrónico no es válido',
            'email.unique' =>'El correo electrónico ya está en uso',
            'gender.required' =>'El género es requerido',
            'gender.in' =>'El genero de ser uno de los valores dados masculino o femenino',
            'address' =>'required|string',
            'phone' =>'required|string',
            'country_id' =>'required',
        ];
    }
}
