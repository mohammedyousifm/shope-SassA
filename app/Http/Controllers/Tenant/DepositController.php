<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\StoreDepositMethodRequest;
use App\Http\Requests\Tenant\UpdateDepositMethodRequest;
use App\Services\Tenant\DepositService;
use App\Services\Tenant\UserBalanceService;
use App\Models\WalletDeposit;
use App\Models\DepositMethod;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display deposits list
     */
    public function index(Request $request, DepositService $service)
    {
        // Get tenant safely from container
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        $tenantName = $tenant->name;


        $deposits = $service->getDeposits($request->all(), $tenant);
        $depositMethods = DepositMethod::all();

        return view('tenant.deposits.index', compact('deposits', 'depositMethods', 'tenantName'));
    }

    /**
     * Store new deposit method
     */
    public function store(
        StoreDepositMethodRequest $request,
        DepositService $service
    ) {
        $service->createMethod($request->validated());

        return back()->with('success', 'Deposit method added successfully');
    }

    /**
     * Update deposit method
     */
    public function update(Request $request, $depositMethod)
    {
        $method = DepositMethod::findOrFail($depositMethod);

        $method->update([
            'name'           => $request->name,
            'account_name'   => $request->account_name,
            'account_number' => $request->account_number,
            'is_active'      => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Deposit method updated successfully');
    }


    /**
     * Approve wallet deposit
     */


    public function accept(
        string $subdomain,
        WalletDeposit $deposit,
        DepositService $service,
        UserBalanceService $balanceService
    ) {
        $service->approveDeposit($deposit, $balanceService);

        return back()->with('success', 'Deposit approved successfully');
    }



    /**
     * Reject wallet deposit
     */
    public function reject(
        WalletDeposit $deposit,
        DepositService $service
    ) {
        $service->rejectDeposit($deposit);

        return back()->with('success', 'Deposit rejected successfully');
    }

    /**
     * Delete deposit method
     */
    public function destroy(
        DepositMethod $method,
        DepositService $service
    ) {
        $service->deleteMethod($method);

        return back()->with('success', 'Deposit method deleted successfully');
    }
}
