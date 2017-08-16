<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SaleOrder;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->input('code');
        $user_name = $request->input('user_name');

        $query = SaleOrder::query();
        if ($code) {
            $query->where('code', 'like', '%'.$code.'%');
        }
        if ($user_name) {
            $query->where('user_name', 'like', '%'.$user_name.'%');
        }

        $obj_list = $query->get();
        return view('saleorder/index', [
            'obj_list'=>$obj_list,
            'code'=>$code,
            'user_name'=>$user_name,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_list = Product::where('status', '=', 'on')->get();
        return view('saleorder/create', ['product_list'=>$product_list]);
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
            'code' => 'required|max:100',
            'product_id' => 'required:numeric',
            'price' => 'required:numeric',
            'channel' => 'required|max:50',
            'user_name' => 'required|max:50',
            'user_phone' => 'required|max:11',
            'people_number' => 'required|numeric',
            'trip_date'=>'required:date',
        ];
        $attrs = [
            'code' => '订单编号',
        ];
        $this->validate($request, $rules, [], $attrs);

        // TODO验证失败 错误提示

        $obj = new SaleOrder();
        $obj->fill($request->all());
        $obj->save();

        return redirect('/sale_order');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = SaleOrder::find($id);
        $product_list = Product::where('status', '=', 'on')->get();
        return view('saleorder/edit', [
            'obj'=>$obj,
            'product_list'=>$product_list,
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
            'code' => 'required|max:100',
            'product_id' => 'required:numeric',
            'price' => 'required:numeric',
            'channel' => 'required|max:50',
            'user_name' => 'required|max:50',
            'user_phone' => 'required|max:11',
            'people_number' => 'required|numeric',
            'trip_date'=>'required:date',
        ];
        $attrs = [
            'code' => '订单编号',
        ];
        $this->validate($request, $rules, [], $attrs);

        $obj = SaleOrder::find($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect('/sale_order');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $obj = SaleOrder::find($id);
        $obj->delete();
        return redirect('/sale_order');
    }

    public function confirm(Request $request, $id)
    {
        $obj = SaleOrder::find($id);
        $obj->status = 'confirmed';
        $obj->save();
        return redirect('/sale_order');
    }


    public function cancel(Request $request, $id)
    {
        $obj = SaleOrder::find($id);
        $obj->status = 'cancel';
        $obj->save();
        return redirect('/sale_order');
    }
}
