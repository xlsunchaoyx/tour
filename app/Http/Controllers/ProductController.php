<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Product::query();
        $obj_list = $query->get();
        return view('product/index', [
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
        return view('product/create');
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
            'name' => 'required|max:100',
            'price' => 'required:numeric',
        ];
        $attrs = [
            'name' => '线路名称',
            'price' => '价格',
        ];
        $this->validate($request, $rules, [], $attrs);

        // TODO验证失败 错误提示

        $obj = new Product();
        $obj->fill($request->all());
        $obj->save();

        return redirect('/product');
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
        $obj = Product::find($id);
        return view('product/edit', [
            'obj'=>$obj,
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
            'name' => 'required|max:100',
            'price' => 'required:numeric',
        ];
        $attrs = [
            'name' => '线路名称',
            'price' => '价格',
        ];
        $this->validate($request, $rules, [], $attrs);

        $obj = Product::find($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        $obj->delete();
        return redirect('/product');
    }
}
