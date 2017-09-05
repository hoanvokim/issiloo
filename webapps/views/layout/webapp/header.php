<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    Facebook sharecode-->
    <meta property="og:site_name" content="issiloo.edu.vn"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url"
          content="<?php echo $title_header; ?>"/>
    <meta property="og:title"
          content="<?php echo $title_header; ?>"/>
    <meta property="og:description"
          content="<?php echo $title_header; ?>"/>
    <meta property="og:image" content="<?php
    if (empty($banner_bg)) {
        echo base_url() . 'webresources/images/banner0.jpg';
    }
    else {
        echo base_url() . $banner_bg;
    }
    ?>"/>
    <meta property="og:image:width" content="12"/>
    <meta property="og:image:height" content="360"/>
    <!--    End Facebook sharecode-->

    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <title><?php echo $title_header; ?> | ISSILOO</title>

    <!--    CSS-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>webresources/images/favicon.png">
    <link href="<?php echo base_url(); ?>webresources/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>webresources/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/animsition.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>webresources/css/animate.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) {
                return;
            }
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) {
                f._fbq = n;
            }
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '126616871073518');
        fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=126616871073518&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <!--    Google analytics-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-89380943-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body class="home">
<?php $this->load->view('layout/webapp/menu'); ?>