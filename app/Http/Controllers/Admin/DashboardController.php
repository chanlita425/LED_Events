<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => 0,
            'services' => 5,
            'articles' => 0,
            'contacts' => 0,
        ];

        return view('backend.page.dashboard', compact('stats'));
    }
}
