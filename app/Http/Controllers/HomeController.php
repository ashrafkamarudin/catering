<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Package $package)
    {   
        $package = Package::limit(3)->get();
        
        return view('customer.main')->with('packages', $package);
    }
}
