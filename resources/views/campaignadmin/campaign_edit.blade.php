@extends('campaignadmin.layout')

@section('content')
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Edit-Campaign</div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<form method="post" action="{{{ URL::to('/update') }}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id='_token'>
            <input type="hidden" name="id" value="{{$data['id']}}" >
            <input type="hidden" name="type" value="campaign">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="campaign_name" value="{{$data['name']}}">
            </div>
            <div class="form-group">
              <select class="form-control" name='client_id'>
                 <option value=''>Customer of</option>
                 @foreach ($client as $li)
                 <option value="{{$li['id']}}">{{$li['name']}}</option>
                 @endforeach
              </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="description" placeholder="description" value="{{$data['description']}}">
            </div>
            
            <button class="btn btn-primary" type="botton" id='appanto'>修改</button>
       </form>
	</div>
@endsection