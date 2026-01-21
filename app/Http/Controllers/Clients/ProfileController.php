<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\UpdateClientProfileRequest;
use App\Http\Requests\Clients\UpdateClientPasswordRequest;
use App\Services\Clients\ClientProfileService;

class ProfileController extends Controller
{
    /**
     * عرض صفحة الملف الشخصي
     */
    public function index()
    {
        $client = auth()->guard('client')->user();

        $userBalance = $client->wallet?->balance ?? 0;

        return view('clients.profile.index', compact('client', 'userBalance'));
    }

    /**
     * تحديث البيانات الشخصية
     */
    public function updateProfile(
        UpdateClientProfileRequest $request,
        ClientProfileService $service
    ) {
        $client = auth()->guard('client')->user();

        $service->updateProfile($client, $request->validated());

        return back()->with('success', 'تم تحديث البيانات الشخصية بنجاح.');
    }

    /**
     * تحديث كلمة المرور
     */
    public function updatePassword(
        UpdateClientPasswordRequest $request,
        ClientProfileService $service
    ) {
        $client = auth()->guard('client')->user();

        $service->updatePassword($client, $request->validated());

        return back()->with('success', 'تم تحديث كلمة المرور بنجاح.');
    }
}
