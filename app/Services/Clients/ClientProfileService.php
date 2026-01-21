<?php

namespace App\Services\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ClientProfileService
{
    public function updateProfile(Client $client, array $data): void
    {
        $client->update($data);
    }

    public function updatePassword(Client $client, array $data): void
    {
        if (! Hash::check($data['current_password'], $client->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'كلمة المرور الحالية غير صحيحة',
            ]);
        }

        $client->update([
            'password' => Hash::make($data['password']),
        ]);
    }
}
