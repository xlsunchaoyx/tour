<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleOrder;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = SaleOrder::query();
        $obj_list = $query->get();
        return view('report/index', [
            ]);
    }

}
