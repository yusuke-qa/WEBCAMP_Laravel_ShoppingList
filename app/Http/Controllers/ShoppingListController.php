<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CompletedShoppingList;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingListController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        ShoppingList::create([
            'user_id' => Auth::id(),
            'name'    => $request->input('name'),
        ]);

        return redirect('/home')->with('message', '「買うもの」を登録しました！！');
    }

    public function complete($id)
    {
        $item = ShoppingList::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        DB::transaction(function () use ($item) {
            CompletedShoppingList::create([
                'user_id' => $item->user_id,
                'name'    => $item->name,
            ]);
            $item->delete();
        });

        return redirect('/home');
    }

    public function destroy($id)
    {
        ShoppingList::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail()
            ->delete();

        return redirect('/home');
    }
}