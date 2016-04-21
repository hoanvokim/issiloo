<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>webresources/dashboard/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>webresources/dashboard/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>webresources/dashboard/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">
<div class="form-box" id="login-box">
    <div class="header">Sign In</div>
    <?php echo form_open('verifylogin'); ?>
    <div class="body bg-gray">
        <div class="form-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="User ID" autofocus/>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember_me"/> Remember me
        </div>
    </div>
    <div class="footer">
        <button type="submit" class="btn bg-olive btn-block">Sign me in</button>
    </div>
    </form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>