<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newsevents = NewsEvent::all();

        return view('home',compact('newsevents'));
    }
}
