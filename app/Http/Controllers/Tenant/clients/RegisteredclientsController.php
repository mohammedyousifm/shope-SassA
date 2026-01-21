<?php

namespace App\Http\Controllers\Tenant\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredclientsController extends Controller
{
    /**
     * Show tenant client registration form
     */
    public function create()
    {
        return view('tenant.auth.register');
    }

    /**
     * Register a new client for the current tenant
     */
    public function store(Request $request)
    {
        // 1️⃣ Get current tenant from subdomain context
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        if (! $tenant) {
            abort(404);
        }

        // 2️⃣ Validate input (NO tenant_id here)
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8',
        ]);

        // 3️⃣ Create client bound to tenant
        $client = Client::create([
            'tenant_id' => $tenant->id,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);


        // 5️⃣ Redirect to tenant dashboard
        return redirect()->route('clients.index');
    }
}
