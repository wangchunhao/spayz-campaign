<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <!-- Bootstrap Admin Theme -->
        <link href="../Bootstrap/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                display: none;
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-without-padding">
        <div class="container">
            <div class="row">
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    请输入正确的用户名和密码！
                </div>
                <!-- <form method="post" action="" class="bootstrap-admin-login-form"> -->
                <div class="bootstrap-admin-login-form">
                    <h1>登录</h1>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="用户名" id='username'>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="密码" id='password'>
                    </div>
                    <button class="btn btn-lg btn-primary" onclick='login()'>登录</button>
                </div>
                <!-- </form> -->
            </div>
        </div>

        <script src='../js/jquery-2.0.0.min.js'></script>
        <script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/campaignadmin.js"></script>
    </body>
</html>
