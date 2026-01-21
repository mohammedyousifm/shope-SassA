<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MerchantRegisterController extends Controller
{
    public function show()
    {
        return view('landing.auth.register');
    }

    public function store(Request $request)
    {


        $request->validate([
            'store_name' => 'required|string|max:255',
            'subdomain'  => 'required|alpha_dash|unique:tenants,subdomain',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8',
        ]);



        DB::transaction(function () use ($request, &$tenant, &$user) {

            // 1️⃣ Create Tenant
            $tenant = Tenant::create([
                'name'      => $request->store_name,
                'subdomain' => $request->subdomain,
                'status'    => 'pending',
            ]);

            // 2️⃣ Create Merchant Admin
            $user = User::create([
                'tenant_id' => $tenant->id,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'role'      => 'merchant_admin',
            ]);
        });

        // 3️⃣ Login Merchant
        Auth::login($user);

        // 4️⃣ Redirect to subdomain
        return redirect()->route('merchant.plans');
    }
}
