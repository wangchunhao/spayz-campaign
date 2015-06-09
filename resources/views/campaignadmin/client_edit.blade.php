@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Edit-Client</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/update') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id='_token'>
            <input type="hidden" name="id" value="{{$data['id']}}" >
            <input type="hidden" name="type" value="client">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="客户名称" value="{{$data['name']}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="description" placeholder="描述" value="{{$data['description']}}">
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>修改</button>
       </form>
	</div>
@endsection