<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Euro</title>

    <!-- Bootstrap Core CSS -->
    <style type="text/css">@import url("<?php echo base_url('assets/sbadmin/vendor/bootstrap/css/bootstrap.min.css') ?>")</style>
    <!-- MetisMenu CSS -->
    <style type="text/css">@import url("<?php echo base_url('assets/sbadmin/metisMenu/metisMenu.min.css') ?>")</style>
    <!-- Custom CSS -->
    <style type="text/css">@import url("<?php echo base_url('assets/sbadmin/dist/css/sb-admin-2.css') ?>")</style>
    
    <!-- Custom Fonts -->
    <style type="text/css">@import url("<?php echo base_url('assets/sbadmin/vendor/font-awesome/css/font-awesome.min.css') ?>")</style>
    <style type="text/css">@import url("<?php echo base_url('assets/jquery/jquery-ui.css') ?>")</style>
    <style type="text/css">@import url("<?php echo base_url('assets/jquery/autocombo.css') ?>")</style>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/external/jquery/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-ui.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/autocombo.js') ?>"></script>

    <!-- CORE JQUERY dari Assett  -->
    <!-- <script src="<?=base_url('assett/js/jquery-1.10.2.js')?>"></script> -->
    <!-- BOOTSTRAP SCRIPTS  -->
    <!-- <script src="<?=base_url('assett/js/bootstrap.js')?>"></script> -->
      <!-- CUSTOM SCRIPTS   -->
    <!-- <script src="<?=base_url('assett/js/custom.js')?>"></script> -->
    <!-- <script type="text/javascript" src="<?=base_url('assett/js2/input_mask/jquery.inputmask.js')?>"></script> -->
    <script src="<?=base_url('assett/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
    <script src="<?=base_url('assett/js/jquery.maskedinput.min.js')?>"></script>
    <script src="<?=base_url('assett/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.js') ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/sbadmin/dist/js/sb-admin-2.js') ?>"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Euro</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                
                        <li><a href="<?php echo site_url("account/index")?>"><i class="fa fa-sign-out fa-fw"></i> Logout </a>
                        </li>
                    <!-- /.dropdown-user -->
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo site_url('welcome/index')?>"><i class="fa fa-dashboard fa-fw"></i> Profil </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Master <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url("cpelanggan/index")?>">Pelanggan</a></li>
                                <li><a href="<?php echo site_url("csales/index")?>">Sales</a></li>
                                <li><a href="<?php echo site_url("cbarang/index")?>">Barang</a></li>
                                <li><a href="<?php echo site_url("ctransaksi/index")?>">Transaksi</a></li>
                                <li><a href="<?php echo site_url("claporan/index")?>">Laporan</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


