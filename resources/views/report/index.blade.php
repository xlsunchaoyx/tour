@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h2>订单统计</h2>
            已完成订单数：{{$done}}<br/>
            已服务人次：{{$people_count}}<br/>
            已订单金额：{{$total_price}}
        </div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group">
                    <label for="start_date">开始时间</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="开始时间" value="{{$start_date}}">
                </div>
                <div class="form-group">
                    <label for="end_date">结束时间</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" placeholder="结束时间" value="{{$end_date}}">
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
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
