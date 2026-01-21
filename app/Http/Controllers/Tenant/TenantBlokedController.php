<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;


class TenantBlokedController extends Controller
{
    public function index()
    {

        $tenant = app()->bound('tenant') ? app('tenant') : null;

        // 3️⃣ If tenant is suspended → blocked page
        if ($tenant->status === 'active') {
            return redirect('/');
        }

        return view('tenant.subscription.bloked');
    }
}
