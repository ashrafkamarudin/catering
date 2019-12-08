<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;
use Image;

class PackageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('customer.package.show')
                ->withPackage($package);
    }
}
