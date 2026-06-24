<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect('/home');
    }

    public function destroy($id)
    {
        return redirect('/home');
    }
}