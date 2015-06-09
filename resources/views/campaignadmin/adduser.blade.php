@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Add-User</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/add') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id='_token'>
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="UserName" id='username'>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email" id='email'>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" id='password'>
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>添加</button>
       </form>
	</div>
@endsection