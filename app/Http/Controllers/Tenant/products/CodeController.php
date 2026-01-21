<?php

namespace App\Http\Controllers\Tenant\products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Tenant\ProductStoreRequest;
use App\Services\Tenant\ProductStoreService;
use App\Models\Tenant;
use App\Models\Game;
use App\Models\Client;
use App\Models\GiftCardOrder;
use App\Models\GiftCard;
use App\Models\GiftCardCode;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;


class CodeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = GiftCardCode::paginate(10);
        $games = Game::get();
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        $tenantName =  $tenant->name;
        return view('tenant.products.code', compact('code', 'tenantName', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => ['required', 'exists:games,id'],
            'value'   => ['required', 'numeric'],
            'price'   => ['required', 'numeric'],
            'codes'   => ['required', 'array', 'min:1'],
            'codes.*' => ['required', 'string'],
        ]);

        $tenant = app()->bound('tenant') ? app('tenant') : null;

        DB::transaction(function () use ($validated, $tenant) {

            // 1️⃣ Get or create GiftCard (NO duplicates)
            $giftCard = GiftCard::firstOrCreate(
                [
                    'game_id' => $validated['game_id'],
                    'value'   => $validated['value'],
                ],
                [
                    'price'   => $validated['price'],
                ]
            );

            // 2️⃣ Create codes
            foreach ($validated['codes'] as $code) {
                GiftCardCode::create([
                    'gift_card_id' => $giftCard->id,
                    'tenant_id'    => $tenant?->id,
                    'code'         => $code,
                    'is_used'      => false,
                    'used_by' => null
                ]);
            }
        });

        return redirect()
            ->route('tenant.code.products')
            ->with('success', 'تم إضافة الأكواد بنجاح');
    }
}
