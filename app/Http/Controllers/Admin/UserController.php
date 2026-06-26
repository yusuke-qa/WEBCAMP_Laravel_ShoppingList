<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        $users = User::withCount('completedShoppingLists')->get();
        return view('admin.user_list', compact('users'));
    }
}