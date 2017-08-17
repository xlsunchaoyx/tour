@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/plan" method="post">
                {{ csrf_field() }}


              <div class="form-group">
                <label for="trip_date" class="col-sm-2 control-label">出团日期</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="trip_date" name="trip_date" placeholder="出团日期">
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
