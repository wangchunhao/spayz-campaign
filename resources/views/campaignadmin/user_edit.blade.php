@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Edit-User</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/update') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id='_token'>
            <input type="hidden" name="id" value="{{$data['id']}}" >
            <input type="hidden" name="type" value="user">
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="用户名" id='username' value="{{$data['username']}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="邮箱" id='email' value="{{$data['email']}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="密码" id='password' value="{{$data['password']}}">
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>修改</button>
       </form>
	</div>
@endsection