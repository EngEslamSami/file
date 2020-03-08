<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>بروفايل عضو جمعية عمومية</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">


    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/calendar.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/table.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/stylecrm.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/profile.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">


</head>
<body>

<header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color:#2d2b2b !important ;">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav col-sm-9 ">

                <li> <a href="#" class="home-icon">
                        <i  class="fa fa-home" style=""></i>
                        <span>الرئيسية</span></a>
                </li>

                <li class="name_of_charity">
                    <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/sympol2.png" alt="">

                </li>
                <li class="name_of_vision">
                    <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/Saudi_Vision_2030_logo.png" alt="">

                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right col-sm-3" style="    margin-top: 16px;">

                <li class="dropdown dropdown-user" style="margin: -6px 30px 0 30px;">

                    <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
                        <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/avatar5.png"
                             class="img-circle" width="45" height="45" alt="user">
                    </a>

                    <ul class="dropdown-menu" >
                        <li>
                            <a target="_blank" href="#">
                                <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/avatar5.png"
                                     class="img-circle" width="100%" height="120" alt="user" >
                            </a>
                        </li>
                        <li class="text-center"><span> </span></li>

                        <li class="text-center"> </li>

                        <li><a class="btn btn-danger sign-out-btn" href="<?php echo base_url() ?>/gam3ia_omomia/Gam3ia_omomia/logout" style="color: #fff;">
                                <span class=""><i class="fa fa-sign-out"></i></span> الخروج</a>
                        </li>

                    </ul>
                </li>




                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-file-o" style="background-color: #ff729d;"></i>
                        <span class="label label-danger">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>

                            <ul class="menu">



                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell" style="background-color: #a887e0;"></i>
                        <span id="test" class="label label-danger" >0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>

                            <ul class="menu">




                            </ul>
                        </li>
                    </ul>
                </li>




                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell" style="background-color: #0bc1ab;"></i>
                        <span id="test" class="label label-danger" > 0 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>

                            <ul class="menu">




                            </ul>
                        </li>
                    </ul>
                </li>



                <li class="dropdown dropdown-help hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs" style="background-color: #f6be07;"></i></a>
                    <ul class="dropdown-menu" >

                        <li><a herf="#" id="change-css" rel="" >
                                <i class="fa fa-check-circle"></i> المظهر الأساسى</a>
                        </li>
                        <li><a id="change-css1" rel="https://abnaa-sa.org/asisst/admin_asset/css/themes/theme1.css" >
                                <i class="fa fa-check-circle"></i> المظهر الهادى</a>
                        </li>

                        <li>
                            <a id="change-css2" rel="https://abnaa-sa.org/asisst/admin_asset/css/themes/theme2.css"> <i class="fa fa-check-circle"></i> المظهر القياسى</a>
                        </li>
                        <li><a id="change-css3" rel="https://abnaa-sa.org/asisst/admin_asset/css/themes/theme3.css"><i class="fa fa-check-circle"></i> المظهر الدافئ</a></li>
                        <li><a id="change-css4" rel="https://abnaa-sa.org/asisst/admin_asset/css/themes/theme4.css"><i class="fa fa-check-circle"></i> المظهر البارد</a></li>

                    </ul>
                </li>





            </ul>




        </div>
    </nav>
</header>