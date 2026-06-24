<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::where('user_id', Auth::id())
            ->orderBy('name')
            ->paginate(5);

        return view('home', compact('shoppingLists'));
    }
}