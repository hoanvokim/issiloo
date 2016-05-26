<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="http://www.coachesneedsocial.com/wp-content/uploads/2014/12/BannerWCircleImages-1.jpg" />
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <title><?php echo $title_header; ?> | ISSILOO</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webresources/images/favicon.png">
    <link href="<?php echo base_url(); ?>webresources/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>webresources/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/animsition.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/style.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url(); ?>webresources/js/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        .float-left{
            float:left;
        }

        .message {
            display: none;
            font-size: 16px;
            width:100%;
            padding: 10px;
            border:1px solid #cccccc;
        }

        .success {
            display: block;
            color:green;
        }

        .error {
            display:block;
            color:darkred;
        }

        pre{
            background-color: #ffffff;
            border:none;
        }

        /* Note: Try to remove the following lines to see the effect of CSS positioning */
        .affix {
            top: 0;
            width: 100%;
            position: fixed;
            left: 0;
            right: 0;
            background: #ffffff;
            z-index: 999;
            border-bottom: 0.2px solid #2e4c95;
        }

        .affix .logo {
            margin-top: 10px;
            margin-left: 20px;
        }

        .affix-top nav ul > li ul {
            top: 61px;
        }
        .submenu {
            top: 0px !important;
        }
        .affix + .container-fluid {
            padding-top: 70px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".message").fadeOut(5000);

            $('#search_keyword').keydown(function (event) {
                var keypressed = event.keyCode || event.which;
                if (keypressed == 13) {
                    var action_str = $(this).closest('form').attr('action');
                    var keyword_str = $(this).val();
                    var updated_link = action_str + keyword_str;
                   $(this).closest('form').attr('action',updated_link);
                   $(this).closest('form').submit();
                }
            });

        });
    </script>

</head>
<body class="home">
<!-- LOADER  -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
<div class="animsition"> <!-- start of animsition -->
<?php $this->load->view('layout/webapp/menu'); ?>