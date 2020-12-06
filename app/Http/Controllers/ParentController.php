<?php

namespace FYP\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('parent.index');
    }
}
