<!DOCTYPE html>
<html lang="en">

<head>
    <title> HomePage | ISSILOO</title>
    <?php $this->load->view('layout/dm/header'); ?>
</head>

<body>
<div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">

    <?php $this->load->view('layout/dm/header_bar'); ?>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <section id="content-container">
            <header class="pageheader">
                <h3><i class="fa fa-home"></i> Dashboard </h3>
                <div class="breadcrumb-wrapper"><span class="label">You are here:</span>
                    <ol class="breadcrumb">
                        <li><a href="#"> Home </a></li>
                        <li class="active"> Dashboard</li>
                    </ol>
                </div>
            </header>

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <div class="row">
                    <!--YOU WRITE HERE-->
                    <?php $this->load->view('components/dm/intro'); ?>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->

        </section>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->

        <?php $this->load->view('layout/dm/navigation'); ?>

    </div>

    <?php $this->load->view('layout/dm/footer_bar'); ?>

</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

</body>
</html>
