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
                        <th>状态</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obj_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->name }}</th>
                        <td>{{ $obj->price }}</td>
                        <th>{{ $obj->get_status() }}</th>
                        <td>

                        @if( in_array($obj->status, ['draft', 'off']) )
                            <a href="/product/{{$obj->id}}/up" class="btn btn-primary btn-sm" role="button">上架</a>
                        @else
                            <a href="/product/{{$obj->id}}/down" class="btn btn-primary btn-sm" role="button">下架</a>
                        @endif

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
