<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Game;
use App\Models\GameOrder;
use App\Models\GiftCardOrder;


class ClientsController extends Controller
{
    public function index()
    {
        // Authenticated client
        $client = auth()->guard('client')->user();

        $userBalance = $client->wallet?->balance ?? 0;

        // Current tenant (from subdomain / container)
        $tenant = app()->bound('tenant') ? app('tenant') : abort(404);

        /*
    |--------------------------------------------------------------------------
    | Active Games with Active Packages (Tenant scoped)
    |--------------------------------------------------------------------------
    */
        $games = Game::query()
            ->where('tenant_id', $tenant->id)
            ->where('is_active', true)
            ->with([
                'packages' => function ($q) {
                    $q->where('is_active', true);
                }
            ])
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Client Game Orders (Tenant scoped)
    |--------------------------------------------------------------------------
    */
        $gameOrders = GameOrder::query()
            ->where('client_id', $client->id)
            ->whereHas('game', function ($q) use ($tenant) {
                $q->where('tenant_id', $tenant->id);
            })
            ->with(['game', 'package'])
            ->latest()
            ->paginate(10, ['*'], 'game_orders_page');

        /*
    |--------------------------------------------------------------------------
    | Gift Card Games (Only with available codes, Tenant scoped)
    |--------------------------------------------------------------------------
    */
        $giftCardGames = Game::query()
            ->where('tenant_id', $tenant->id)
            ->where('is_active', true)
            ->whereHas('giftCard.codes', function ($q) {
                $q->where('is_used', false);
            })
            ->with([
                'giftCard' => function ($q) {
                    $q->whereHas('codes', function ($q2) {
                        $q2->where('is_used', false);
                    });
                }
            ])
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Client Gift Card Orders (Tenant scoped)
    |--------------------------------------------------------------------------
    */
        $giftCardOrders = GiftCardOrder::query()
            ->where('client_id', $client->id)
            ->whereHas('code.giftCard.game', function ($q) use ($tenant) {
                $q->where('tenant_id', $tenant->id);
            })
            ->with(['code.giftCard.game'])
            ->latest()
            ->paginate(10, ['*'], 'gift_card_orders_page');

        return view('clients.index', compact(
            'client',
            'games',
            'giftCardGames',
            'gameOrders',
            'giftCardOrders',
            'userBalance'
        ));
    }
}
