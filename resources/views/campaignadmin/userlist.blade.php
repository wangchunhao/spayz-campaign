@extends('campaignadmin.layout')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="text-muted bootstrap-admin-box-title">Admin-Users <a href="/adduser"><button class='btn btn-success' data-toggle="tooltip" data-original-title="AddUser"><i class='glyphicon glyphicon-plus'></i></button></a></div>
	</div>
	<div class="bootstrap-admin-panel-content">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Username</th>
					<th>email</th>
					<th>AddTime</th>
					<th>Group</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class='set'>
				@foreach ($data as $li)
				<tr>
					<td>{{$li['username']}}</td>
					<td>{{$li['email']}}</td>
					<td>{{$li['created_at']}}</td>
					<td>{{$li['confirmed']}}</td>
					<td>
						<a href="javascript:;" onclick="del('user',{{$li['id']}})">
							<i class="glyphicon glyphicon-trash"></i>
						</a>
						&nbsp;
						<a href="{{{ URL::to('/edit?id='.$li['id'].'&type=user') }}}">
							<i class="glyphicon glyphicon-edit" ng-class=""></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div></div>
@endsection