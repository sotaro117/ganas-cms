<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function index()
    {
        return Inertia::render('About/Index');
    }

    public function supporter()
    {
        return Inertia::render('About/Supporter');
    }

    public function ads()
    {
        return Inertia::render('About/Ads');
    }

    public function contact()
    {
        return Inertia::render('About/Contact');
    }
}
