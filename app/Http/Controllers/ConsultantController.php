<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Display the consultant index page.
     */
    public function index($lang)
    {
        return view('consaltant.index');
    }
}
