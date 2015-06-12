<!DOCTYPE html>
<html>
    <head>
        <title>Campaign-Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="../Bootstrap/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">

        <!-- Vendors -->
        <!-- (...) -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-with-small-navbar">
       <nav class="navbar navbar-default navbar-inverse navbar-fixed-top " role="navigation">
	 <div class="container">
       <div class="row">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{{ URL::to('/') }}}">Spayz-Campaign</a>
		  </div>
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- <ul class="nav navbar-nav">
              <li class="active"><a href="#">首页</a></li>
              <li ><a href="#">关于我们</a></li>              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">下拉菜单<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul> -->
		
			<ul class="nav navbar-nav navbar-right">
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }}<b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="#">设置</a></li>
				  <li><a href="#">个人资料</a></li>
				  <li><a href="#">账户中心</a></li>
				  <li class="divider"></li>
				  <li><a href="{{ url('/auth/logout') }}">退出登录</a></li>
				</ul>
			  </li>
			</ul>
		  </div><!-- /.navbar-collapse -->
		  </div>
		  </div>
		</nav>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                <div class="col-md-2 bootstrap-admin-col-left">
                     <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                         <li >
                            <a href="{{{ URL::to('/') }}}"><i class="glyphicon glyphicon-chevron-right"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/lists?type=user') }}}"><i class="glyphicon glyphicon-chevron-right"></i>UserList</a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/adduser') }}}"><i class="glyphicon glyphicon-chevron-right"></i>AddUser</a>
                        </li>
                        <li >
                            <a href="{{{ URL::to('/lists?type=client') }}}"><i class="glyphicon glyphicon-chevron-right"></i>ClientList</a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/addclient') }}}"><i class="glyphicon glyphicon-chevron-right"></i>AddClient</a>
                        </li>
                         <li >
                            <a href="{{{ URL::to('/lists?type=campaign') }}}"><i class="glyphicon glyphicon-chevron-right"></i>CampaignList</a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/addcampaign') }}}"><i class="glyphicon glyphicon-chevron-right"></i>AddCampaign</a>
                        </li>
                    </ul>
                </div>

                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="panel panel-default">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src='../js/jquery-2.0.0.min.js'></script>
        <script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src='../js/campaignadmin.js'></script>
    </body>
</html>
