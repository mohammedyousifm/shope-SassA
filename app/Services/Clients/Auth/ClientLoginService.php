<?php

namespace App\Services\Clients\Auth;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ClientLoginService
{
    public function login(array $credentials, $tenant): Client
    {
        if (! $tenant) {
            abort(404);
        }

        $client = Client::where('tenant_id', $tenant->id)
            ->where('email', $credentials['email'])
            ->first();

        if (! $client || ! Hash::check($credentials['password'], $client->password)) {
            throw ValidationException::withMessages([
                'email' => 'بيانات تسجيل الدخول غير صحيحة',
            ]);
        }

        if (! $client->email_verified_at) {
            throw ValidationException::withMessages([
                'email' => 'يجب تأكيد البريد الإلكتروني أولاً',
            ]);
        }

        auth()->guard('client')->login($client);


        return $client;
    }
}
