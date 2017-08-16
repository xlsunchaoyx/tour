@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        <a href="/sale_order/create" class="btn btn-primary btn" role="button">新增订单</a>
        </div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group">
                    <label for="code">订单编号</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="订单编号" value="{{ $code }}">
                </div>
                <div class="form-group">
                    <label for="user_name">联系人</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="联系人" value="{{ $user_name }}">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>产品</th>
                        <th>联系人</th>
                        <th>出行日期</th>
                        <th>出行人数</th>
                        <th>状态</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obj_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->code }}</th>
                        <td>{{ $obj->product->name }}</td>
                        <td>{{ $obj->user_name }}</td>
                        <td>{{ $obj->trip_date }}</td>
                        <td>{{ $obj->people_number }}</td>
                        <td>{{ $obj->get_status() }}</td>
                        <td>
                        @if( in_array($obj->status, ['draft',]) )
                            <a href="/sale_order/{{$obj->id}}/confirm" class="btn btn-primary btn-sm" role="button">确认</a>
                            <a href="/sale_order/{{$obj->id}}/cancel" class="btn btn-primary btn-sm" role="button">取消</a>
                        @endif

                            <a href="/sale_order/{{$obj->id}}/edit" class="btn btn-primary btn-sm" role="button">编辑</a>
                            &nbsp;&nbsp;
                            <a href="/sale_order/{{$obj->id}}/delete" class="btn btn-danger btn-sm" role="button">删除</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
