<style type="text/css">
    .panel-success > .panel-heading {
        color: #fff;
        background-color: #046883;
        border-color: #046883;
    }

    .control-label {
        color: #002542
    }

    .login-family {
        min-height: 500px;
        background-image: url(<?=base_url().'asisst/web_asset/'?>img/bgg.jpg);
        background-position: center;
        background-size: 100% 100%;
    }

    .login-area {
        margin-top: 55px;
        box-shadow: 2px 2px 8px #000;
    }

    .login-area .panel-body {
        background: url(<?=base_url().'asisst/web_asset/'?>img/back2.jpg);
        background-size: 100% 100%;
        background-position: center;
        height: 300px;
    }

    .login-area .panel-body .form-control {
        height: 45px;
    }
</style>


<section class="banner_page" style=" background: url(<?= base_url() . 'asisst/web_asset/' ?>img/profile-bg.png);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>web">الرئيسية</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">خدمات أسرة</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_login">دخول مستفيد</a></li>
        </ol>
    </div>
</section>


<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="login-family">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php if($this->session->flashdata('message2')){?>
                    <div class="col-md-12 alert alert-danger" style="color:red;"><?php  echo $this->session->flashdata('message2') ?> </div>
                <?php } ?>
                <div class="login-area  ">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="view-header">
                                <div class="header-icon">
                                    <i class="pe-7s-unlock "></i>
                                </div>
                                <div class="header-title">
                                    <h4>  تسجيل دخول عضو جمعيه عموميه </h4>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body" style="padding: 30px;">
                            <?php echo form_open_multipart(base_url() . 'gam3ia_omomia/Gam3ia_omomia/do_login') ?>

                            <div class="form-group">
                                <label class="control-label" for="username">إسم المستخدم</label>
                                <input type="text" placeholder="برجاء إدخال إسم المستخدم الخاص بك "
                                       title="برجاء إدخال إسم المستخدم الخاص بك" required="" value="" name="memb_user_name"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">كلمة المرور</label>
                                <input type="password" title="برجاء إدخال كلمة المرور الخاص بك "
                                       placeholder="برجاء إدخال كلمة المرور الخاص بك" required="" value=""
                                       name="memb_password" id="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-add btn-success" name="login" type="submit" value="1"
                                        style="font-size:20px">الدخول
                                </button>
                            </div>
                            <?php echo form_close() ?>
                        </div>

                        <!--  <div class="panel-footer">الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء</div>-->


                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</section>