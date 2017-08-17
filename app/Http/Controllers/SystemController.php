<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::query();
        $obj_list = $query->get();
        return view('system/index', [
            'obj_list'=>$obj_list
            ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $obj = User::find($id);
        $obj->delete();
        return redirect('/system');
    }

}
