@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/sale_order/{{$obj->id}}" method="post">
                {{ csrf_field() }}

              <div class="form-group">
                <label for="code" class="col-sm-2 control-label">订单编号</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="code" name="code" placeholder="订单编号" value="{{ $obj->code }}">
                </div>
              </div>

              <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">线路</label>
                <div class="col-sm-10">
                <select class="form-control" name="product_id">
                    <option value="">请选择</option>
                    <option value="1" selected>喀纳斯五日游</option>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">价格</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" placeholder="价格" value="{{ $obj->price }}">
                </div>
              </div>

              <div class="form-group">
                <label for="channel" class="col-sm-2 control-label">渠道</label>
                <div class="col-sm-10">
                  <select class="form-control" name="channel">
                    <option value="">请选择</option>
                    <option value="天猫">天猫</option>
                    <option value="马蜂窝" selected>马蜂窝</option>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">联系人</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="联系人" value="{{ $obj->user_name }}">
                </div>
              </div>

              <div class="form-group">
                <label for="user_phone" class="col-sm-2 control-label">联系人电话</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="联系人电话" value="{{ $obj->user_phone }}">
                </div>
              </div>

              <div class="form-group">
                <label for="people_number" class="col-sm-2 control-label">出行人数</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="people_number" name="people_number" placeholder="出行人数" value="{{ $obj->people_number }}">
                </div>
              </div>

              <div class="form-group">
                <label for="trip_date" class="col-sm-2 control-label">出行日期</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="trip_date" name="trip_date" placeholder="出行日期" value="{{ $obj->trip_date }}">
                </div>
              </div>

              <div class="form-group">
                <label for="remark" class="col-sm-2 control-label">备注</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="remark" name="remark" placeholder="备注">{{$obj->remark}}</textarea>
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">新增</button>
                </div>
              </div>
            </form>

        </div>
    </div>
</div>
@endsection
