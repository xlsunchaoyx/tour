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
    public function index(Request $request)
    {
        $rules = [
            'start_date'=>'date|nullable',
            'end_date'=>'date|nullable',
        ];
        $attrs = [
            'start_date' => '开始时间',
            'end_date' => '结束时间',
        ];
        $this->validate($request, $rules, [], $attrs);

        $start_date = $request->input('start_date', '');
        $end_date = $request->input('end_date', '');
        $query = SaleOrder::query();
        $query->where('status', '=', 'done');

        if ($start_date) {
            $query->where('trip_date', '>=', $start_date);
        }
        if ($end_date) {
            $query->where('trip_date', '<=', $end_date);
        }
        $obj_list = $query->get();

        // 人数计算
        $people_count = 0;
        $total_price = 0;
        foreach ($obj_list as $obj) {
            $people_count += $obj->people_number;
            $total_price += $obj->price;
        }


        return view('report/index', [
            'obj_list'=>$obj_list,
            'done'=>$query->count(),
            'people_count'=>$people_count,
            'total_price'=>$total_price,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            ]);
    }

}
