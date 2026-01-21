<?php

namespace App\Http\Controllers\Tenant\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Client;


class TenantClientsController extends Controller
{
    public function index(Request $request)
    {

        $users = Client::latest()->paginate(10);
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        $tenantName =  $tenant->name;

        return view('tenant.clients.index', compact('users', 'tenantName'));
    }
}
