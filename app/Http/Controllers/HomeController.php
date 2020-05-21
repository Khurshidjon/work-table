<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
  //      $role = Role::findById(4);
//        Role::create(['name' => 'admin']);
//        $role->givePermissionTo([1,2,3,4,6,7]);
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
