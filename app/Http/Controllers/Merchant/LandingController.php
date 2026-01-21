<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
}
