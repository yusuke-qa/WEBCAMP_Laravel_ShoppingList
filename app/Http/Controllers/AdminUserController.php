<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::withCount('completedShoppingLists')->get();
        return view('admin.user_list', compact('users'));
    }
}