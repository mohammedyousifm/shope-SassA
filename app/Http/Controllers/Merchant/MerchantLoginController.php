<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantLoginController extends Controller
{
    public function show()
    {
        // حماية: الدخول فقط من الدومين الرئيسي
        if (request()->getHost() !== 'subd.test') {
            abort(404);
        }

        return view('landing.auth.login');
    }

    public function store(Request $request)
    {
        // Protection: POST only from main domain
        if ($request->getHost() !== 'subd.test') {
            abort(404);
        }

        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'بيانات تسجيل الدخول غير صحيحة'])
                ->withInput();
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Validation checks
        if ($user->role === 'super_admin') {
            Auth::logout();
            return back()->withErrors(['email' => 'هذا الحساب مخصّص لإدارة المنصة فقط']);
        }

        if (!$user->tenant) {
            Auth::logout();
            return back()->withErrors(['email' => 'هذا الحساب غير مرتبط بأي متجر']);
        }

        if ($user->is_blocked) {
            Auth::logout();
            return back()->withErrors(['email' => 'تم إيقاف هذا الحساب']);
        }

        // Regenerate session for security
        $request->session()->regenerate();

        // Redirect to tenant subdomain
        $tenant = $user->tenant;

        return redirect()->away(
            "http://{$tenant->subdomain}.subd.test/dashboard"
        );
    }
}
