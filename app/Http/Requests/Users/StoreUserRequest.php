<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'dni' => ['required'],
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:10'],
            'password' => ['required', 'min:8', 'max:16'],
        ];
    }
    public function attributes()
    {
        return [
            'dni' => 'identifacion',
            'name' => 'nombre',
            'phone' => 'telefono',
            'password' => 'contraseña',

        ];
    }
}
