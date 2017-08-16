@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/product" method="post">
                {{ csrf_field() }}

              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">线路名称</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="线路名称">
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">价格</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" placeholder="价格">
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
