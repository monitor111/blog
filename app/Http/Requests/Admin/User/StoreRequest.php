<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Це поле необхідно для заповнення.',
            'name.string' => 'Ім,я повинно бути строкой.',
            'email.required' => 'Це поле необхідно для заповнення.',
            'email.string' => 'Почта повинно бути строкой.',
            'email.email' => 'Ваша пошта повинна відповідати формату mail@some.domain.',
            'email.unique' => 'Користувач з таким Email вже існує.',
        ];
    }
}
