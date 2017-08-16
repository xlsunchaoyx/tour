@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/sale_order" method="post">
                {{ csrf_field() }}

              <div class="form-group">
                <label for="code" class="col-sm-2 control-label">订单编号</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="code" name="code" placeholder="订单编号">
                </div>
              </div>

              <div class="form-group">
                <label for="product_id" class="col-sm-2 control-label">线路</label>
                <div class="col-sm-10">
                <select class="form-control" name="product_id">
                    <option value="">请选择</option>
                    @foreach ($product_list as $product)
                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">价格</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" placeholder="价格">
                </div>
              </div>

              <div class="form-group">
                <label for="channel" class="col-sm-2 control-label">渠道</label>
                <div class="col-sm-10">
                  <select class="form-control" name="channel">
                    <option value="">请选择</option>
                    <option value="天猫">天猫</option>
                    <option value="马蜂窝">马蜂窝</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">联系人</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="联系人">
                </div>
              </div>

              <div class="form-group">
                <label for="user_phone" class="col-sm-2 control-label">联系人电话</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="联系人电话">
                </div>
              </div>

              <div class="form-group">
                <label for="people_number" class="col-sm-2 control-label">出行人数</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="people_number" name="people_number" placeholder="出行人数">
                </div>
              </div>

              <div class="form-group">
                <label for="trip_date" class="col-sm-2 control-label">出行日期</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="trip_date" name="trip_date" placeholder="出行日期">
                </div>
              </div>

              <div class="form-group">
                <label for="remark" class="col-sm-2 control-label">备注</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="remark" name="remark" placeholder="备注"></textarea>
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
