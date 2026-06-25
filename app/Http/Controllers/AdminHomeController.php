<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}