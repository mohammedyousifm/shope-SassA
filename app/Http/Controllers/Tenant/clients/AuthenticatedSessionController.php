<?php

namespace App\Http\Controllers\Tenant\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Client;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('tenant.auth.login');
    }
}
