<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(10);

        return view('manage.sales.index')
                ->withSales($sales);
    }

    public function receipt(sale $sale)
    {
        # code...
        return view('manage.sales.receipt')
                ->withSale($sale);;
    }
}
