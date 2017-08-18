<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\SaleOrder;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Plan::query();
        $obj_list = $query->get();
        return view('plan/index', [
                'obj_list'=>$obj_list,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan/create', [
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'trip_date'=>'required:date',
        ];
        $attrs = [
            'trip_date' => '出团日期',
        ];
        $this->validate($request, $rules, [], $attrs);

        // TODO验证失败 错误提示

        $obj = new Plan();
        $obj->fill($request->all());
        $obj->save();

        return redirect('/plan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Plan::find($id);
        $query = SaleOrder::query();
        $query->where('plan_id', '=', $id);

        $order_list = $query->get();
        return view('plan/edit', [
            'obj'=>$obj,
            'order_list'=>$order_list,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'trip_date'=>'required:date',
        ];
        $attrs = [
            'trip_date' => '出团日期',
        ];
        $this->validate($request, $rules, [], $attrs);

        $obj = Plan::find($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect('/plan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Plan::find($id);
        $count = SaleOrder::where('plan_id', '=', $id)->count();
        if (!$count) {
            $obj->delete();
        }

        return redirect('/plan');
    }

    public function confirm($id)
    {
        $obj = Plan::find($id);
        $obj->status = 'done';
        $obj->save();

        foreach ($obj->orders as $order) {
            $order->status = 'done';
            $order->save();
        }


        return redirect('/plan');
    }
}
