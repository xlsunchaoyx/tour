@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        <a href="/plan/create" class="btn btn-primary btn" role="button">新建计划</a>
        </div>
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>出团日期</th>
                        <th>订单数</th>
                        <th>出行人数</th>
                        <th>订单总金额</th>
                        <th>状态</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obj_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->trip_date }}</th>
                        <td>{{ $obj->total_saleorder_count() }}</td>
                        <td>{{ $obj->total_people() }}</td>
                        <td>{{ $obj->total_price() }}</td>
                        <td>{{ $obj->get_status() }}</td>
                        <td>
                        @if( in_array($obj->status, ['draft',]) )
                            <a href="/plan/{{$obj->id}}/confirm" class="btn btn-primary btn-sm" role="button">完成</a>
                            &nbsp;&nbsp;
                            <a href="/plan/{{$obj->id}}/edit" class="btn btn-primary btn-sm" role="button">操作</a>
                            &nbsp;&nbsp;
                            <a href="/plan/{{$obj->id}}/delete" class="btn btn-danger btn-sm" role="button">删除</a>
                        @endif
                            
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
