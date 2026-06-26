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
    public function list()
    {
        $shoppingLists = ShoppingList::where('user_id', Auth::id())
            ->orderBy('name')
            ->paginate(3);

        return view('home', compact('shoppingLists'));
    }

    public function register(Request $request)
    {
        $request->validate(['name' => ['required']]);

        ShoppingList::create([
            'user_id' => Auth::id(),
            'name'    => $request->input('name'),
        ]);

        return redirect('/shopping_list/list')->with('message', '「買うもの」を登録しました！！');
    }

    public function complete($shopping_list_id)
    {
        $item = ShoppingList::where('id', $shopping_list_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        DB::transaction(function () use ($item) {
            CompletedShoppingList::create([
                'user_id' => $item->user_id,
                'name'    => $item->name,
            ]);
            $item->delete();
        });

        return redirect('/shopping_list/list');
    }

    public function delete($shopping_list_id)
    {
        ShoppingList::where('id', $shopping_list_id)
            ->where('user_id', Auth::id())
            ->firstOrFail()
            ->delete();

        return redirect('/shopping_list/list');
    }
}