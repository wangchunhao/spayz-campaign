@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Add-Campaign</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/add') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="campaign">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Campagin Name">
            </div>
            <div class="form-group">
              <select class="form-control" name='client_id'>
                 <option value=''>Customer of</option>
                 @foreach ($data as $li)
                 <option value="{{$li['id']}}">{{$li['name']}}</option>
                 @endforeach
              </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="description" placeholder="Description">
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>添加</button>
       </form>
	</div>
@endsection