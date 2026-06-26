<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CompletedShoppingList;
use Illuminate\Support\Facades\Auth;

class CompletedShoppingListController extends Controller
{
    public function list()
    {
        $completedLists = CompletedShoppingList::where('user_id', Auth::id())
            ->orderBy('name')
            ->orderBy('created_at')
            ->paginate(3);

        return view('completed_list', compact('completedLists'));
    }
}