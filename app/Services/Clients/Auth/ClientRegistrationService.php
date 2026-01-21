<?php

namespace App\Services\Clients\Auth;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientRegistrationService
{
    public function register(array $data, $tenant): Client
    {
        if (! $tenant) {
            abort(404);
        }

        return Client::create([
            'tenant_id' => $tenant->id,
            'name'      => $data['name'],
            'email'     => $data['email'],
            'email_verified_at' =>  now(),
            'password'  => Hash::make($data['password']),
        ]);
    }
}
