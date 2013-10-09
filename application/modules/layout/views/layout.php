<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Clarion:: Online Wiki Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/bootstrap2.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/bootplus-responsive.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/bootswatch.min.css">
       <script src="<?php echo base_url(); ?>assets/default/js/jquery-1.8.2.min.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->


    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#" name="top">Clarion:: Online Wiki Test</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="#"><i class="icon-home"></i> Home</a></li>
                            <li class="divider-vertical"></li>


                            <li class="active"><a href="#"><i class="icon-file"></i> TEST</a></li>
                            <li class="divider-vertical"></li>



                        </ul>
                        <?php $this->layout->load_view('layout/_login'); ?>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </div>
            <!--/.navbar-inner -->
        </div>
        <!--/.navbar -->
        <div class="container">
            <?php echo $content; ?>
            <footer>
                <div class="row">
                    <div class="col-lg-12">


                    </div>
                </div>
            </footer>
        </div>
        <script src="<?php echo base_url(); ?>assets/default/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/bootswatch.js"></script>
    </body>
</html>