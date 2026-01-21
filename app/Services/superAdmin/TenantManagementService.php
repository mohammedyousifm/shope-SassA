<?php

namespace App\Services\superAdmin;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantManagementService
{
    /**
     * Get tenants list with search and pagination
     */
    public function getTenantsList(Request $request)
    {
        return Tenant::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('subdomain', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->paginate(10);
    }
}
