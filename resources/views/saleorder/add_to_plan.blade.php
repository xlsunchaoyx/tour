@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <form class="form-horizontal" action="/sale_order/{{$id}}/add_to_plan" method="post">
                {{ csrf_field() }}

              <div class="form-group">
                <label for="plan_id" class="col-sm-2 control-label">出团计划</label>
                <div class="col-sm-10">
                  <select class="form-control" name="plan_id">
                    <option value="">请选择</option>
                    @foreach ($plan_list as $plan)
                      <option value="{{ $plan->id }}">{{ $plan->trip_date }}</option>
                    @endforeach
                </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">保存</button>
                </div>
              </div>
            </form>

        </div>
    </div>
</div>
@endsection
