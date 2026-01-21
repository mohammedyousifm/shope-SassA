<?php

namespace App\Http\Controllers\Tenant\products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GamesRequest;
use App\Services\Dashboard\GamesStoreService;
use Illuminate\Http\Request;
use App\Models\GamePackage;

class PackagesController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        GamePackage::create([
            'game_id' => $request->game_id,
            'name'  => $request->name,
            'price'   => $request->price,
        ]);

        return back()->with('success', 'تمت إضافة الباقة بنجاح');
    }

    public function update(Request $request, GamePackage $package)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $package->update([
            'name'  => $request->name,
            'price' => $request->price,
        ]);

        return back()->with('success', 'تم تعديل الباقة بنجاح');
    }


    public function toggle(GamePackage $GamePackage)
    {
        $GamePackage->update([
            'is_active' => ! $GamePackage->is_active,
        ]);

        return back()->with('success', 'تم تحديث حالة اللعبة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gifitcard =  GamePackage::findOrFail($id);
        $gifitcard->delete();
        return back()->with('success', 'تمت حزف  باقة  بنجاح');
    }
}
