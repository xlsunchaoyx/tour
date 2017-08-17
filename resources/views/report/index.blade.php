@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h2>订单统计</h2>
            已完成订单数：100<br/>
            已服务人次：100<br/>
            已订单金额：10000
        </div>
        <div class="col-md-10">
            <form class="form-inline">
                <div class="form-group">
                    <label for="code">开始时间</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="开始时间" value="2017-01-01">
                </div>
                <div class="form-group">
                    <label for="user_name">结束时间</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="结束时间" value="2017-12-01">
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
                

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
