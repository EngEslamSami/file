<!--<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60">

        </div>


        <div class="col-sm-12 padding-30 white_background">

            <div class="col-md-12 alert alert_sucess">

                <div class="col-xs-3"></div>
                <?php echo form_open_multipart('WebProfile/Login')?>
                <div class="col-xs-6">
                    <?php
                    if(isset($_SESSION['message']))
                        echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    <div class="form-group">
                        <label class="right main-label col-xs-2 no-padding" >اسم المستخدم</label>
                        <input type="text" name="name" class="form-control col-xs-4 no-padding" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label class="right main-label col-xs-2 no-padding" >كلمة المرور</label>
                        <input type="password" name="pass" class="form-control col-xs-4 no-padding" data-validation="required" >
                    </div>

                    <div class="form-group">
                        <label class="right main-label col-xs-2 no-padding" > نوع المستخدم </label>
                        <input type="radio" name="user_type" value="1" class="" data-validation="required" > اسرة
                        <input type="radio" name="user_type" value="2" class="" data-validation="required" >   كفيل
                        <input type="radio" name="user_type" value="3" class="" data-validation="required" > متبرع
                    </div>
                    <div class="form-group text-center">
                        <div class="padding-30">
                           <a href="<?php echo base_url();?>WebProfile/register" class="btn btn-default tbra"> انشاء حساب</a>
                           <input  type="submit" name="log_my" value="دخول" class="btn btn-default tbra"/>


                       </div>
                       <?php echo form_close()?>

                   </div>

               </div>

               <div class="col-xs-3"></div>

           </div>


       </div>


   </div>
</section>
-->



<div class="sign-sec">
    <div class="inner">
        <div class="center_forma col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h5>تسجيل الدخول <i class="fa fa-lock fa-2x pull-right"></i></h5>
                    </div>
                </div>
                <div class="panel-body">


                    <?php echo form_open_multipart('WebProfile/Login');?>

                    <?php
                    if(isset($_SESSION['message']))
                        echo 'gnvf';//$_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                    <div class="form-group">
                        <label class="sr-only" for="username">username</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="name" id="username" placeholder="إسم المستخدم" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password">password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="password" name="pass" class="form-control" id="password" placeholder="كلمة المرور" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="right main-label col-xs-2 no-padding" > نوع المستخدم </label>
                        <input type="radio" name="user_type" value="1" class="" data-validation="required" > اسرة
                        <input type="radio" name="user_type" value="2" class="" data-validation="required" >   كفيل
                        <input type="radio" name="user_type" value="3" class="" data-validation="required" > متبرع
                    </div>

                    <div class="form-group text-center">
                        <button class="btn thm-btn" type="submit" name="log_my" value="دخول" >تسجيل الدخول</button>
                    </div>
                    <div class="form-group ">
                        <label>ليس لديك حساب يمكنك <a href="<?php echo base_url();?>WebProfile/register">التسجيل </a> الأن</label>
                    </div>
                  <!--  <div class="form-group ">
                        <label>هل نسيت كلمة المرور <a href="#">إسترجاع </a> الأن</label>
                    </div>-->
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>