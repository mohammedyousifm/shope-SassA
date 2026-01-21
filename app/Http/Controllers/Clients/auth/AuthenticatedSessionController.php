<?php

namespace App\Http\Controllers\clients\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\Auth\LoginClientRequest;
use App\Services\Clients\Auth\ClientLoginService;
use Illuminate\Http\Request;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        if (auth()->guard('client')->check()) {
            return redirect()->route('clients.index');
        }

        return view('clients.auth.login');
    }

    public function store(
        LoginClientRequest $request,
        ClientLoginService $service
    ) {
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        $service->login($request->validated(), $tenant);

        return redirect()->away(
            "http://{$tenant->subdomain}.subd.test/"
        );
    }
}
