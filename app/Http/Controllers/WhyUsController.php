<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        return view('components.why-us');
    }
}
