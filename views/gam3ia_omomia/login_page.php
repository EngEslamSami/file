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
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


    <style>
        .small {
            position: relative;
            bottom: auto;
            left: auto;
            font-size: 10px;
        }

        .alert-danger {
            color: white;
            background-color: #E5343D !important;
            border-color: #BD000A !important;
        }

        .alert {
            color: white;
            background-color: #E5343D !important;
            border-color: #BD000A !important;
            border-radius: 5px;
        }

        .alert-dismissible .close {
            font-size: 16px;
            top: -14px;
            right: -31px;
            text-shadow: none;
            opacity: 1;
        }

        #login-page {
            font-family: 'hl';
            background: url(<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/login/brida.jpg);
            background-position: center center;
            background-size: 100% 100%;
        }

        #login-page .login-wrapper:after {
            display: none !important;
            content: "";
            background-color: rgba(16, 16, 16, 0.6);
            /* background-color: rgba(60, 153, 11,0.3); */
            width: 100%;
            height: 100%;
            position: absolute;
        }

    </style>


</head>
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
<!-- Content Wrapper -->
<section id="login-page">
    <div class="login-wrapper">
        <div class="container-center ">
            <div class="wow bounceInDown" data-wow-delay="0.4s">


                <div class="login-area">
                    <div class="panel panel-bd panel-custom">

                        <div class="panel-body">
                            <?php if ($this->session->flashdata('message2')) { ?>
                                <div class="col-md-12 alert alert-danger"
                                     style="color:red;"><?php echo $this->session->flashdata('message2') ?> </div>
                            <?php } ?>
                            <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/logo-abnaa.png"
                                 width="100%">
                            <h5 class="text-green text-center">تسجيل دخول الأعضاء</h5>
                            <?php echo form_open_multipart(base_url() . 'gam3ia_omomia/Gam3ia_omomia/do_login') ?>


                            <div class="form-group">
                                <div class="input-stylish">
                                    <i class="fa fa-user-circle"></i>
                                    <input type="text" placeholder="برجاء إدخال إسم المستخدم الخاص بك "
                                           title="برجاء إدخال إسم المستخدم الخاص بك" required="" value=""
                                           name="memb_user_name" class="">
                                    <div class="stylish"></div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="input-stylish ">

                                    <i class="fa fa-key"></i>
                                    <input type="password" title="برجاء إدخال كلمة المرور الخاص بك "
                                           placeholder="برجاء إدخال كلمة المرور الخاص بك" required="" value=""
                                           name="memb_password" id="password" class="">
                                    <div class="stylish"></div>
                                </div>


                            </div>

                            <div class="text-center">
                                <button class="btn btn-add" value="1" name="login" type="submit"> الدخول &nbsp <i
                                            class="fa fa-sign-in" style="    transform: rotate(180deg);"
                                            aria-hidden="true"></i>
                                </button>
                            </div>
                            <?php echo form_close() ?>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>


</section>
<script type="text/javascript" src="https://abnaa-sa.org/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="https://abnaa-sa.org/asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="https://abnaa-sa.org/asisst/admin_asset/js/custom.js"></script>
<script src="https://abnaa-sa.org/asisst/admin_asset/js/owl.carousel.min.js"></script>

<script language="javascript">
    function autoResizeDiv() {
        document.getElementById('login-page').style.height = window.innerHeight + 'px';
    }

    function autoResizeDivMobile() {
        document.getElementById('login-page').style.height = 'auto';
    }


    var mq = window.matchMedia("(min-width: 767px)");

    if (mq.matches) {
        // the width of browser is more then 767px

        window.onresize = autoResizeDiv;
        autoResizeDiv();
    } else {
        // the width of browser is less then 767px

        window.onresize = autoResizeDivMobile;
        autoResizeDivMobile();
    }
</script>

<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 400);

</script>
<script>

    $(document).ready(function () {

        "use strict";

        $(".input-stylish input").focus(function () {

            $(this).parent().find(".stylish").animate({width: "100%"}, 500);
            $(this).parent().find("i").addClass("moveToRight");


        });
        $(".input-stylish input").blur(function () {

            $(this).parent().find(".stylish").css({width: "0%"});
            $(this).parent().find("i").removeClass("moveToRight");

        });


    });


</script>

</body>
</html>



	