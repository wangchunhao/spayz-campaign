@extends('campaignadmin.layout')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="text-muted bootstrap-admin-box-title">Client-List <a href="/addclient"><button class='btn btn-success'><i class='glyphicon glyphicon-plus'></i></button></a></div>
    </div>
    <div class="bootstrap-admin-panel-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class='set'>
                @foreach ($data as $li)
                <tr>
                    <td>{{$li['name']}}</td>
                    <td>{{$li['logo']}}</td>
                    <td>{{$li['description']}}</td>
                    <td>
                        <a href="javascript:;" onclick="del('client',{{$li['id']}})">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                        &nbsp;
                        <a href="{{{ URL::to('/edit?id='.$li['id'].'&type=client') }}}">
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