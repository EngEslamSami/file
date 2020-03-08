<style type="text/css">
    .panel-success>.panel-heading {
        color: #fff;
        background-color: #96c73e;
        border-color: #96c73e;
    }
    .control-label{
        color: #002542
    }

    .login-family{
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
        background:url(<?=base_url().'asisst/web_asset/'?>img/back2.jpg);
        background-size: 100% 100%;
        background-position: center;
        height: 300px;
    }
    .login-area .panel-body .form-control{
        height: 45px;
    }
</style>

<div class="sidebar-quick-links-fixed hidden-xs">
    <a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home"></i>
                <span>دخول الموظفين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-users"></i>
                <span>دخول مستفيدين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول متعفف </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-money"></i>
                <span>دخول  متبرع</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول  كفيل</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sidebar Quick Links -->


<div class="social-sidebar hidden-xs" dir="ltr">
    <ul>
        <li class="facebook">
            <a href="#" target="_blank">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيسبوك</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#" target="_blank">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>
        <li class="instagram">
            <a href="#" target="_blank">
                <i class="fa fa-instagram"></i>
                <span>تابعنا على انستجرام</span>
            </a>
        </li>
        <li class="youtube">
            <a href="#" target="_blank">
                <i class="fa fa-youtube-play"></i>
                <span>تابعنا على يوتيوب</span>
            </a>
        </li>
        <li class="snapchat">
            <a href="#" target="_blank">
                <i class="fa fa-snapchat-ghost"></i>
                <span>تابعنا على سناب شات</span>
            </a>
        </li>
    </ul>
</div>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
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
        <div class="login-family" >
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="login-area  ">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="view-header">
                                <div class="header-icon">
                                    <i class="pe-7s-unlock "></i>
                                </div>
                                <div class="header-title">
                                  <h4>تسجيل دخول مستفيد  </h4>
                              </div>
                          </div>
                      </div> 
                      <div class="panel-body" style="padding: 30px;">
                        <form action="" role="form" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="control-label" for="username">إسم المستخدم</label>
                                <input type="text" placeholder="برجاء إدخال إسم المستخدم الخاص بك " title="برجاء إدخال إسم المستخدم الخاص بك" required="" value="" name="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">كلمة المرور</label>
                                <input type="password" title="برجاء إدخال كلمة المرور الخاص بك " placeholder="برجاء إدخال كلمة المرور الخاص بك" required="" value="" name="user_pass" id="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-add btn-success" name="login" type="submit" style="font-size:20px">الدخول</button>
                            </div>
                        </form>                                    </div>

                        <!--  <div class="panel-footer">الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء</div>-->



                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</section>