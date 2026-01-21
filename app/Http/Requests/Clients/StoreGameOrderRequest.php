<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard('client')->check();
    }

    public function rules(): array
    {
        return [
            'game_id'         => ['required', 'exists:games,id'],
            'game_package_id' => ['required', 'exists:game_packages,id'],
            'player_id'       => ['required', 'string'],
        ];
    }
}
