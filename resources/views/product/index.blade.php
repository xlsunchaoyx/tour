@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        <a href="/product/create" class="btn btn-primary btn" role="button">新增产品线路</a>
        </div>
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>线路名称</th>
                        <th>价格</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obj_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->name }}</th>
                        <td>{{ $obj->price }}</td>
                        <td>
                            <a href="/product/{{$obj->id}}/edit" class="btn btn-primary btn-sm" role="button">编辑</a>
                            &nbsp;&nbsp;
                            <a href="/product/{{$obj->id}}/delete" class="btn btn-danger btn-sm" role="button">删除</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
