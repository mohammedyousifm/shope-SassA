<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Services\superAdmin\TenantManagementService;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    /**
     * Display a paginated list of tenants with optional search
     */
    public function index(Request $request, TenantManagementService $service)
    {
        $tenants = $service->getTenantsList($request);

        return view('super-admin.tenants.index', compact('tenants'));
    }
}
