<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;


class TenantPendingController extends Controller
{
    public function index()
    {

        $tenant = app()->bound('tenant') ? app('tenant') : null;

        if (!$tenant) {
            abort(404, 'Invalid subdomain');
        }

        // 3️⃣ If tenant is suspended → blocked page
        if ($tenant->status != 'pending') {
            return redirect('/');
        }

        return view('tenant.subscription.pending');
    }
}
