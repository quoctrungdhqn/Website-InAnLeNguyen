<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
<head>
    <title>Đăng nhập | Trang quản trị website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>templates/admin/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>templates/admin/css/bootstrap-theme.min.css">

    <!-- Bootstrap Admin Theme -->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>templates/admin/css/bootstrap-admin-theme.css">

    <!-- Custom styles -->
    <style type="text/css">
        .alert {
            margin: 0 auto 20px;
        }
    </style>

</head>
<body class="bootstrap-admin-without-padding">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('message') == "1") { ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    <strong>Whoops!</strong> Tên đăng nhập hoặc Mật khẩu không đúng.
                </div>
            <?php } ?>
            <form action="<?php echo base_url(); ?>users/loginAdmin" method="post" class="bootstrap-admin-login-form">
                <h1>Quản trị website</h1>
                <div class="form-group">
                    <input class="form-control" required="" type="text" name="username"
                           placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <input class="form-control" required="" type="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        // Setting focus
        $('input[name="username"]').focus();

        // Setting width of the alert box
        var alert = $('.alert');
        var formWidth = $('.bootstrap-admin-login-form').innerWidth();
        var alertPadding = parseInt($('.alert').css('padding'));

        if (isNaN(alertPadding)) {
            alertPadding = parseInt($(alert).css('padding-left'));
        }

        $('.alert').width(formWidth - 2 * alertPadding);
    });
</script>
</body>
</html>
