<?php

namespace App\Http\Controllers\clients\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\Auth\RegisterClientRequest;
use App\Services\Clients\Auth\ClientRegistrationService;
use Illuminate\Http\Request;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Auth;
use App\Mail\EmailOtpMail;
use Illuminate\Support\Facades\Mail;

class RegisteredclientsController extends Controller
{
    /**
     * Show tenant client registration form
     */
    public function create()
    {
        if (auth()->guard('client')->check()) {
            return redirect()->route('clients.index');
        }

        return view('clients.auth.register');
    }

    /**
     * Register a new client for the current tenant
     */
    public function store(
        RegisterClientRequest $request,
        ClientRegistrationService $service
    ) {
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        $service->register($request->validated(), $tenant);

        return redirect()
            ->route('clients.index')
            ->with('success', 'تم إنشاء العميل بنجاح');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:clients,email',
        ]);


        $code = random_int(1000, 9999);


        EmailOtp::updateOrCreate(
            [
                'email' => $request->email,
                'type'  => 'client',
            ],
            [
                'code'       => $code,
                'expires_at' => now()->addMinutes(10),
            ]
        );

        Mail::to($request->email)->send(new EmailOtpMail($code));

        return response()->json(['message' => 'code_sent']);
    }

    public function checkCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|digits:4',
        ]);


        $otp = EmailOtp::where('email', $request->email)
            ->where('type', 'client')
            ->where('code', $request->code)
            ->valid()
            ->first();

        if (! $otp) {
            return response()->json(['message' => 'invalid'], 422);
        }


        return response()->json(['message' => 'verified']);
    }
}
