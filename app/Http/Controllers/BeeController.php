<?php

namespace App\Http\Controllers;

class BeeController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
