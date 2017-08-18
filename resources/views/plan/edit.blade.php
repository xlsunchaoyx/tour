@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/plan/{{$obj->id}}" method="post">
                {{ csrf_field() }}


              <div class="form-group">
                <label for="trip_date" class="col-sm-2 control-label">出团日期</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="trip_date" name="trip_date" placeholder="出团日期" value="{{ $obj->trip_date }}">
                </div>
              </div>


              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">保存</button>
                </div>
              </div>
            </form>

            <hr>
            <h2>订单明细</h2>



            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>产品</th>
                        <th>联系人</th>
                        <th>出行日期</th>
                        <th>出行人数</th>
                        <th>价格</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($order_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->code }}</th>
                        <td>{{ $obj->product->name }}</td>
                        <td>{{ $obj->user_name }}</td>
                        <td>{{ $obj->trip_date }}</td>
                        <td>{{ $obj->people_number }}</td>
                        <td>{{ $obj->price }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
