<?php

namespace App\Http\Requests\Clients\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8',
        ];
    }
}
