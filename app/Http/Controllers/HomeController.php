<?php

namespace App\Http\Controllers;

use App\Region;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    public function register()
    {
        $regions = Region::all();
        return view('backend.superadmin.registration.register', [
            'regions' => $regions
        ]);
    }
}
