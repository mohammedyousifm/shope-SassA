<?php

namespace App\Services\Tenant;


use App\Models\Game;

class ProductStoreService
{
    public function create(array $data): Game
    {
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        return Game::create([
            'name'       => $data['name'],
            'tenant_id' =>  $tenant->id,
        ]);
    }
}
