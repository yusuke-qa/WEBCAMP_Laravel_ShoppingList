<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CompletedShoppingList;
use Illuminate\Support\Facades\Auth;

class CompletedShoppingListController extends Controller
{
    public function index()
    {
        $completedLists = CompletedShoppingList::where('user_id', Auth::id())
            ->orderBy('name')
            ->paginate(3);

        return view('completed_list', compact('completedLists'));
    }
}