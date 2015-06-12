@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Add-Client</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/add') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="client">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Client Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="description" placeholder="Description">
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>添加</button>
       </form>
	</div>
@endsection