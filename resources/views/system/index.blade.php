@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>创建时间</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($obj_list as $obj)
                    <tr>
                        <th scope="row">{{ $obj->id }}</th>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->email }}</td>
                        <td>{{ $obj->created_at }}</td>
                        <td>
                            <a href="/system/{{$obj->id}}/delete" class="btn btn-danger btn-sm" role="button">删除</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
