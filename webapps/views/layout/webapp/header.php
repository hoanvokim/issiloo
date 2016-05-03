<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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