<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tamu;

class TamuController extends Controller
{
    public function index()
    {
        $tamus = Tamu::latest()->get();
        return view('admin.monitoring', compact('tamus'));
    }
}

