<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0038)http://v3.bootcss.com/examples/signin/ -->
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="__PUBLIC__/image/favicon.png">

    <title>安庆市危废管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">

        <form class="form-signin" role="form" action="<?php echo U('Home/Index/login/');?>" method="post" id="login">

            <h2 class="form-signin-heading">安庆市危废管理系统</h2>

            <input type="username" name="username" class="form-control" placeholder="用户名" required="" autofocus="" />
            <input type="password" name="password" class="form-control" placeholder="密码" required="" />
            <input type="code" name="code" class="form-control" placeholder="验证码" required="" />

            <img src="<?php echo U('Home/Index/verify/');?>" id="code" />
            <a href="javascript:void(change_code());">看不清</a>

            <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me">记住密码
            </label> -->

            <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
            <button class="btn btn-lg btn-default btn-block" type="button" id="register">注册</button>

        </form>

        <footer class="bs-footer" role="contentinfo">
            <div class="text-center padder clearfix">
                <p>
                    <small>&copy; 2014, 安庆市环境保护局&nbsp;&nbsp;&nbsp;&nbsp;版权所有.
                    </small>
                </p>
            </div>

        </footer>

    </div>
    <!-- /container -->


    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery core JavaScript -->
    <script type="text/javascript" src="__PUBLIC__/js/jquery-2.0.3.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <!-- My JavaScript-->
    <script type="text/javascript">
    var verifyURL = "<?php echo U('Admin/Index/verify/', '', '');?>";
    </script>
    <script type="text/javascript" src="__PUBLIC__/js/login.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/webpage.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/register.js"></script>
    <script>
    $(document).ready(function() {
        $('#register').click(function() {
            $.post("<?php echo U('Home/Register/first/');?>");
        });
    });
    </script>
</body>

</html>